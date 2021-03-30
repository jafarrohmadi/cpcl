<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CPCLExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CPCLCreateRequest;
use App\Models\Contract;
use App\Models\CPCL;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CPCLController extends Controller
{
    /**
     * @param $contractId
     * @return Application|Factory|View
     */
    public function index($contractId)
    {
        $contract = Contract::find($contractId);

        if (!$contract) {
            abort(404);
        }

        $cpcl = CPCL::where('contract_id', $contractId)->get();

        $countCpcl = count($cpcl);
        $numberRowCpcl = $contract->number_of_row_cpcl;

        $sumPCPL             = $cpcl->sum('fertilizer') ?? 0;
        $total_kg_fertilizer = $contract->total_kg_fertilizer ?? 0;

        $unitFertilizer = $contract->unit_fertilizer ?? 0;

        if ($unitFertilizer == 'ZAK') {
            $total_kg_fertilizer = $total_kg_fertilizer / $contract->zak_to_kg;
        }

        $persentaseCPCL = $kekuranganCPCL = $persentaseCPCLRow = $kekuranganCPCLRow = 0;

        if ($sumPCPL > 0 && $total_kg_fertilizer > 0) {
            $persentaseCPCL = ($sumPCPL / $total_kg_fertilizer) * 100;

        }

        $kekuranganCPCL = (($total_kg_fertilizer - $sumPCPL) / $total_kg_fertilizer) * 100;

        if ($countCpcl > 0 && $numberRowCpcl > 0) {
            $persentaseCPCLRow = ($countCpcl / $numberRowCpcl) * 100;

        }

        $kekuranganCPCLRow = (($numberRowCpcl - $countCpcl) / $numberRowCpcl) * 100;

        return view('admin.cpcl.index', compact('cpcl', 'contractId', 'contract', 'persentaseCPCL', 'kekuranganCPCL', 'persentaseCPCLRow', 'kekuranganCPCLRow'));
    }

    /**
     * @param $contractId
     * @return Application|Factory|View
     */
    public function create($contractId)
    {
        $contract = Contract::find($contractId);

        if (!$contract) {
            abort(404);
        }

        return view('admin.cpcl.create', compact('contractId', 'contract'));
    }

    /**
     * @param CPCLCreateRequest $request
     * @param $contractId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CPCLCreateRequest $request, $contractId)
    {
        $input = $request->all();

        if ($request->hasFile('scan_bast')) {
            $input['scan_bast'] = uploadFile($request->file('scan_bast'));
        }

        CPCL::create($input);

        return redirect()->route('admin.cpcl.index', [$contractId]);
    }

    /**
     * @param $contractId
     * @param CPCL $cpcl
     * @return Application|Factory|View
     */
    public function edit($contractId, CPCL $cpcl)
    {
        $contract = Contract::find($contractId);

        if (!$contract) {
            abort(404);
        }

        return view('admin.cpcl.edit', compact('cpcl', 'contract', 'contractId'));
    }

    /**
     * @param CPCLCreateRequest $request
     * @param $contractId
     * @param CPCL $cpcl
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CPCLCreateRequest $request, $contractId, CPCL $cpcl)
    {
        $input = $request->all();

        if ($request->hasFile('scan_bast')) {
            $input['scan_bast'] = uploadFile($request->file('scan_bast'));
        }

        $cpcl->update($input);

        return redirect()->route('admin.cpcl.index', [$contractId]);
    }

    /**
     * @param $contractId
     * @param CPCL $cpcl
     * @return Application|Factory|View
     */
    public function show($contractId, CPCL $cpcl)
    {
        $contract = Contract::find($contractId);

        if (!$contract) {
            abort(404);
        }
        return view('admin.cpcl.show', compact('cpcl', 'contractId', 'contract'));
    }

    /**
     * @param CPCL $cpcl
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(CPCL $cpcl)
    {
        $cpcl->delete();

        return back();
    }

    /**
     * @param $contractId
     * @return BinaryFileResponse
     */
    public function export_excel($contractId)
    {
        return Excel::download(new CPCLExport($contractId), 'cpcl.xlsx');
    }
}
