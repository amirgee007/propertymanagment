<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterRate extends Model
{
    protected $table = 'meter_rate';

    protected $guarded = [];

    protected $appends = ['meter_type_name'];

    public function meterType()
    {
        return $this->hasOne(MeterType::class, 'id', 'meter_type_id');
    }


    public function getMeterTypeNameAttribute()
    {
        return is_null($this->meterType) ? 'N/A' : $this->meterType->meter_name;
    }
}
