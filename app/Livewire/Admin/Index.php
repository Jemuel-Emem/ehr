<?php

namespace App\Livewire\Admin;

use App\Models\patients as Patient;
use Livewire\Component;

class Index extends Component
{
    public $totalPatients;
    public $admittedPatients;
    public $dischargedPatients;

    public function mount()
    {
        $this->totalPatients = Patient::count();
        $this->admittedPatients = Patient::where('status', 'Admitted for Confinement')->count();
        $this->dischargedPatients = Patient::where('status', 'Ready for Discharge')->count();
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'totalPatients' => $this->totalPatients,
            'admittedPatients' => $this->admittedPatients,
            'dischargedPatients' => $this->dischargedPatients,
        ]);
    }
}
