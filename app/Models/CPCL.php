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
        'scan_bast',
        'fertilizer',
        'zakorkg'
    ];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "This CPCL has been {$eventName}";
    }
}
