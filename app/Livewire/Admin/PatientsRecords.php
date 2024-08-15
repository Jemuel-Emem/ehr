<?php

namespace App\Livewire\Admin;

use App\Models\patients as Patient;
use Livewire\Component;
use Livewire\WithPagination;

class PatientsRecords extends Component
{
    use WithPagination;

    public $perPage = 5;

    public function render()
    {
        $patients = Patient::paginate($this->perPage);
        return view('livewire.admin.patients-records', ['patients' => $patients]);
    }

    public function dischargePatient($id)
    {

        $patient = Patient::find($id);
        if ($patient && $patient->status === 'Admitted for Confinement') {
            $patient->update(['status' => 'Ready for Discharge']);
            flash()->success('Patient Ready For Discharge');
        }
    }
}
