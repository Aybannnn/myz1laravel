<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\CreateReport;
use App\Models\ReportStatus;

class FilterReport extends Component
{
    public $status_id;
    public $query;

    public function render()
    {
        $report = CreateReport::get();
        $status = ReportStatus::get();

        return view('livewire.filter-report', ['report' => $report], ['status' => $status]);
    }

    public function filter()
    {
        $this->dispatch('show-report', 'reloadReport', $this->status_id, $this->query);
    }
}
