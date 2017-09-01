<?php

namespace App\Models;

use App\Services\MeterReadingService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    protected $guarded = [];

    public function meterType() {
        return $this->belongsTo(MeterType::class )->with('meterRates');
    }

    public function meterReadings() {
        return $this->hasMany(MeterReading::class);
    }

    public function lot() {
        return $this->hasOne(Lot::class , 'lot_id' , 'lot_id');
    }

    public function owner() {
        return $this->lot->ownerLot->owner;

    }

    public function lastReading() {
        $totalMeterReadings = $this->meterReadings()->orderBy('reading_date' , 'desc')->get()->toArray();

        if (count($totalMeterReadings) > 1 && isset($totalMeterReadings[1])) {
            return $totalMeterReadings[1]['last_reading'];
        }else
            return 'N/A';
    }

    public function currentReading() {
        $totalMeterReadings = $this->meterReadings()->orderBy('reading_date' , 'desc')->get();

        if (!is_null($totalMeterReadings->first())) {
            return $totalMeterReadings->first()->last_reading;
        }else
            return 'N/A';
    }

    public function lastReadingDate() {
        $totalMeterReadings = $this->meterReadings()->orderBy('reading_date' , 'desc')->get();

        if (!is_null($totalMeterReadings->first())) {
            return Carbon::parse($totalMeterReadings->first()->reading_date)->format('d-m-Y');
        }else
            return 'N/A';
    }

    public function currentUsage() {
        $currentReading = $this->currentReading();
        $lastReading = $this->lastReading();
        $totalUnits = '';

        if (!is_string($lastReading)){

            $totalUnits = $currentReading - $lastReading;
            if (!is_string($totalUnits) && $totalUnits <= 0 && !is_null($this->meterType->minimum_charges)) {
                $totalUnits = "* 0 - Minimum Charges";
            }
        }
        else
            $totalUnits = 'N/A';

        return $totalUnits;
    }

    public function currentAmount() {
        $meterRates = $this->meterType->meterRates;
        $currentReading = $this->currentReading();
        $lastReading = $this->lastReading();

        if (!is_string($lastReading)) {
            $totalUnits = $currentReading - $lastReading;

            return MeterReadingService::consumptionUnitAmount($this->meterType , $meterRates , $totalUnits);

        }else {
            return "N/A";
        }
    }
}
