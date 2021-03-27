<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class CPCL extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected $fillable = [
        'contract_id',
        'province',
        'districts',
        'sub_district',
        'village',
        'farmers_group_name',
        'chairman_farmers_group_name',
        'nik',
        'phone_number',
        'area_ha',
        'planting_schedule',
        'coordinate_point',
        'type_of_land',
        'scan_bast',
        'scan_of_travel_letters',
        'open_camera_photo',
        'scan_ktp',
        'fertilizer'
    ];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "This CPCL has been {$eventName}";
    }
}
