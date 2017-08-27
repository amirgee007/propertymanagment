<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterAssignment extends Model
{
    protected $guarded = [];


    public function meterType() {
        return $this->hasOne(MeterType::class , 'id' , 'meter_type_id');
    }

    public function lotType() {
        return $this->hasOne(LotType::class , 'lot_type_id' , 'lot_type_id');
    }
}
