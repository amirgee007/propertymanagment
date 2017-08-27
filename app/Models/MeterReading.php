<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    protected $table = 'meter_reading';
    protected $guarded = [];


    public function setLastReadingDateAttribute($data) {
        $this->attributes['last_reading_date'] = Carbon::parse($data)->toDateTimeString();
    }
}
