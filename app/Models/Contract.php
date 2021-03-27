<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Contract extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected $fillable = [
        'contract_number',
        'start_date',
        'end_date',
        'work_unit',
        'item_position',
        'quality_test',
        'item_receive',
        'contract_value',
        'tax',
        'real_value',
        'billing_progress',
        'type_of_fertilizer',
        'unit_fertilizer',
        'zak_to_kg',
        'number_of_row_cpcl',
        'total_kg_fertilizer',
    ];

    public function getFertilizer($status)
    {
        $data = [
            1 => 'Pupuk NPK',
            2 => 'Pupuk POP',
            3 => 'Pupuk Dolomi',
            4 => 'Pupuk PHC',
        ];

        return $data[$status];
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Contract has been {$eventName}";
    }
}
