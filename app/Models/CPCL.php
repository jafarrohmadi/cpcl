<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPCL extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'contract_id',
        'province',
        'districts',
        'sub-district',
        'village',
        'farmers_group_name',
        'chairman_farmers_group_name',
        'nik',
        'phone_number',
        'area_ha',
        'zak_npk_fertilizer',
        'kg_npk_fertilizer',
        'kg_pop_fertilizer',
        'kg_dolomit_fertilizer',
        'ltr_phc_fertilizer',
        'planting_schedule',
        'coordinate_point',
        'type_of_land',
        'scan_bast',
        'scan_of_travel_letters',
        'open_camera_photo ',
        'scan_ktp',
    ];
}
