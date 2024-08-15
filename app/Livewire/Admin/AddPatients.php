<?php

namespace App\Livewire\Admin;
use App\Models\patients as Patient;
use Flasher\Prime\FlasherInterface;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class AddPatients extends Component
{

    public $name;
    public $dateofbirth;
    public $contactinformation;
    public $medicalhistory;
    public $currentmedications;
    public $allergies;
    public $status = 'Admitted for Confinement';
    public $editingPatient = null;

    protected $rules = [
        'name' => 'required|string|max:255',
        'dateofbirth' => 'required|date',
        'contactinformation' => 'required|string|max:255',
        'medicalhistory' => 'nullable|string',
        'currentmedications' => 'nullable|string',
        'allergies' => 'nullable|string',
        'status' => 'required|string|in:Admitted for Confinement,Ready for Discharge',
    ];

    public function addPatient()
    {
        $this->validate();

        if ($this->editingPatient) {

            $patient = Patient::find($this->editingPatient);
            $patient->update([
                'name' => $this->name,
                'dateofbirth' => $this->dateofbirth,
                'contactinformation' => $this->contactinformation,
                'medicalhistory' => $this->medicalhistory,
                'currentmedications' => $this->currentmedications,
                'allergies' => $this->allergies,
                'status' => $this->status,
            ]);
            flash()->success('Patient updated successfully');

        } else {

            Patient::create([
                'patientid' => 'P-' . Str::upper(Str::random(8)),
                'name' => $this->name,
                'dateofbirth' => $this->dateofbirth,
                'contactinformation' => $this->contactinformation,
                'medicalhistory' => $this->medicalhistory,
                'currentmedications' => $this->currentmedications,
                'allergies' => $this->allergies,
                'status' => $this->status,
            ]);
            flash()->success('Patient added successfully');

        }

        $this->reset();
    }

    public function editPatient($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $this->editingPatient = $patient->id;
            $this->name = $patient->name;
            $this->dateofbirth = $patient->dateofbirth;
            $this->contactinformation = $patient->contactinformation;
            $this->medicalhistory = $patient->medicalhistory;
            $this->currentmedications = $patient->currentmedications;
            $this->allergies = $patient->allergies;
            $this->status = $patient->status;
        }
    }

    public function deletePatient($id)
    {
        Patient::destroy($id);

       flash()->success('Patient deleted successfully');
    }

    public function render()
    {
        $patients = Patient::all();
        return view('livewire.admin.add-patients', ['patients' => $patients]);
    }
}
