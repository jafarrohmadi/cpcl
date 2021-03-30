<?php

namespace App\Exports;

use App\Models\Contract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

class ContractExport implements FromView, WithEvents
{
    protected $contractId, $startDate, $endDate, $format;

    public function __construct($contractId = null, $startDate = null, $endDate = null, $format)
    {
        $this->contractId = $contractId;
        $this->startDate  = $startDate;
        $this->endDate    = $endDate;
        $this->format     = $format;
    }

    public function registerEvents(): array
    {
        return [

            AfterSheet::class   => function (AfterSheet $event) {
                $event->sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

            },
        ];
    }

    public function view(): View
    {
        $contract = Contract::where([]);
        if ($this->contractId != null && count($this->contractId) > 0) {
            $contract = $contract->whereIn('id', $this->contractId);
        }
        if ($this->startDate != null) {
            $contract = $contract->where('created_at', '>=', $this->startDate);
        }
        if ($this->endDate != null) {
            $contract = $contract->where('created_at', '<=', $this->endDate);
        }

        $contract = $contract->get();

        if ($this->format == 'pdf') {
            return view('admin.contract.export-pdf', ['contract' => $contract]);
        }
        return view('admin.contract.export', ['contract' => $contract]);
    }
}
