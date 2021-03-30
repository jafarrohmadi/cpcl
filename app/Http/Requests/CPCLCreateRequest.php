<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CPCLCreateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'scan_bast'              => 'max:2048',
            'scan_of_travel_letters' => 'max:2048',
            'open_camera_photo'      => 'max:2048',
            'scan_ktp'               => 'max:2048',
        ];
    }
}
