<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeterType extends Model
{
    protected $guarded = [];

    public function meterRates() {
        return $this->hasMany(MeterRate::class);
    }

    public function setTaxAmountAttribute($value) {
        if (!is_null($value))
        $this->attributes['tax_amount'] = rtrim($value,"%");

    }


}
