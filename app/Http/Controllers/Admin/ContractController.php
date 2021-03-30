<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ContractExport;
use App\Exports\CPCLExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ContractController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $contract = Contract::all();

        return view('admin.contract.index', compact('contract'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.contract.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContractRequest $request)
    {
        $input                     = $request->all();
        $input['billing_progress'] = json_encode($request->billing_progress);

        if ($request->hasFile('contract_document')) {
            $input['contract_document'] = uploadFile($request->file('contract_document'));
        }

        if ($request->hasFile('contract_addendum_document')) {
            $input['contract_addendum_document'] = uploadFile($request->file('contract_addendum_document'));
        }

        if ($request->hasFile('billing_document')) {
            $input['billing_document'] = uploadFile($request->file('billing_document'));
        }

        Contract::create($input);

        return redirect()->route('admin.contract.index');
    }

    /**
     * @param Contract $contract
     * @return Application|Factory|View
     */
    public function edit(Contract $contract)
    {
        return view('admin.contract.edit', compact('contract'));
    }

    /**
     * @param Request $request
     * @param Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $input = $request->all();

        if ($request->hasFile('contract_document')) {
            $input['contract_document'] = uploadFile($request->file('contract_document'));
        }

        if ($request->hasFile('contract_addendum_document')) {
            $input['contract_addendum_document'] = uploadFile($request->file('contract_addendum_document'));
        }

        if ($request->hasFile('billing_document')) {
            $input['billing_document'] = uploadFile($request->file('billing_document'));
        }
        $contract->update($request->all());

        return redirect()->route('admin.contract.index');
    }

    /**
     * @param Contract $contract
     * @return Application|Factory|View
     */
    public function show(Contract $contract)
    {
        return view('admin.contract.show', compact('contract'));
    }

    /**
     * @param Contract $contract
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();

        return back();
    }

    public function export_excel(Request $request)
    {
        return Excel::download(new ContractExport($request->contract_number, $request->start_date, $request->end_date,
            $request->formatData), 'contract.' . $request->formatData);
    }
}
