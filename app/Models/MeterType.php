<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterType extends Model
{
    protected $guarded = [];

    public function meterRates() {
        return $this->hasMany(MeterRate::class);
    }


}
