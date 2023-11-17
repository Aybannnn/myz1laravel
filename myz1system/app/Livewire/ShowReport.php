<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\CreateReport;
use App\Models\ReportStatus;

class ShowReport extends Component
{
    public $postreport;

    protected $listeners = ['reloadReport'];

    public function mount()
    {
        $this->postreport = CreateReport::get();
    }

    public function render()
    {
        return view('livewire.show-report');
    }

    public function reloadReport($status_id, $query)
    {
        $this->postreport = ReportStatus::query();

        if ($status_id) {
            $this->postreport = $this->postreport->where('report_status', $status_id);
        }

        if ($query) {
            $this->postreport = $this->postreport->where('client_office', 'like', '%' . $query . '%');
        }

        $this->postreport = $this->postreport->get();
    }

}
