<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes;

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
    ];

    public function getFertilizer($status)
    {
        $data = [
            1 => 'Pupuk NPK (Zak)',
            2 => 'Pupuk NPK (Kg)',
            3 => 'Pupuk POP (Kg)',
            4 => 'Pupuk Dolomit (Kg)',
            5 => 'Pupuk PHC (Ltr)',
        ];

        return $data[$status];
    }
}
