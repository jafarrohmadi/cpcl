<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{

    public function rules()
    {
        return [
            'contract_document'              => 'max:2048',
            'contract_addendum_document' => 'max:2048',
            'billing_document'      => 'max:2048',
        ];
    }
}
