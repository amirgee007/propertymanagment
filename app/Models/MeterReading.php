<?php

namespace App\Models;

use App\Services\MeterReadingService;
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

    /**
     * @return array
     */
    public function readingMonthAndYear() {
        $date = $this->reading_number;
        $month = Carbon::parse($date)->format('F');
        $year = Carbon::parse($date)->format('Y');

        return ['month'=> $month , 'year' => $year];
    }

    public function previousReading() {
        $returnPrevious = $this->where('meter_id' , $this->meter_id)
            ->whereDate('reading_date' ,'<', $this->reading_date)
            ->orderBy('reading_date' , 'desc')->first();

        return $returnPrevious;
    }

    public function previousReadingUnits() {
        $ReadingObj = $this->previousReading();
        if (is_null($ReadingObj))
            $reading = 0;
        else
            $reading = $ReadingObj->last_reading;

        return $reading;
    }

    public function previousReadingAt() {
        $ReadingObj = $this->previousReading();
        if (is_null($ReadingObj))
            $reading = "N/A";
        else
            $reading = $ReadingObj->reading_date;

        return $reading;
    }

    public function unitUsage() {
        return ($this->last_reading - $this->previousReadingUnits());
    }


    public function readingAmount() {
        $meterRates = $this->meter->meterType->meterRates;
        $currentReading = $this->last_reading;
        $lastReading = $this->previousReading();

        if (is_null($lastReading)) {
            $totalUnits = $currentReading;
        }else {
            $totalUnits = $currentReading - $lastReading->last_reading;
        }
            return MeterReadingService::consumptionUnitAmount($this->meter->meterType , $meterRates , $totalUnits);


    }
}
