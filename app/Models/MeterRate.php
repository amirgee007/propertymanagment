<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterRate extends Model
{
    protected $table = 'meter_rate';

    protected $guarded = [];

    public function meterType() {
        return $this->hasOne(MeterType::class , 'id' , 'meter_type_id');
    }
}
