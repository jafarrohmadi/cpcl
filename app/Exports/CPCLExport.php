<?php

namespace App\Exports;

use App\Models\Contract;
use App\Models\CPCL;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CPCLExport implements FromView, ShouldAutoSize
{
    protected $contractId;

    public function __construct($contractId)
    {
        $this->contractId = $contractId;
    }

    public function view(): View
    {
        $cpcl     = CPCL::where('contract_id', $this->contractId)->get();
        $contract = Contract::find($this->contractId);
        return view('admin.cpcl.export', ['cpcl' => $cpcl, 'contract' => $contract]);
    }
}
