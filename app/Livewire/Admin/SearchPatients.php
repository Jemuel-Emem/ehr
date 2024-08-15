<?php

namespace App\Livewire\Admin;

use App\Models\patients as Patient;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPatients extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function searchPatients()
    {

        $this->resetPage();
    }

    public function render()
    {
        $patients = Patient::query()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('patientid', 'like', '%' . $this->search . '%')
                      ->orWhere('contactinformation', 'like', '%' . $this->search . '%');
            })
            ->paginate(5);

        return view('livewire.admin.search-patients', [
            'patients' => $patients,
        ]);
    }
}
