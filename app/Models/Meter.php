<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $guarded = [];

    public function meterReadings() {
        return $this->hasMany(MeterReading::class);
    }
}
