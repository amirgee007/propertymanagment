<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    protected $table = 'meter_reading';
    protected $guarded = [];


    public function setReadingDateAttribute($data) {
        $this->attributes['reading_date'] = Carbon::parse($data)->toDateTimeString();
    }

    public function meter() {
        return $this->belongsTo(Meter::class);
    }
}
