<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
    public function store(Request $request)
    {
        $input = $request->all();
        $input['billing_progress'] = json_encode($request->billing_progress);
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
    public function update(Request $request, Contract $contract)
    {
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
}
