<?php
/**
 * Created by PhpStorm.
 * User: awais
 * Date: 29/08/2017
 * Time: 11:22 PM
 */

namespace App\Services;


use App\Models\MeterRate;

class MeterReadingService
{
    /**
     * @param $meterRates MeterRate
     * @param $totalUnit number total unit used
     */
    public static function consumptionUnitAmount($meter_type , $meterRates , $totalUnit ) {
        $pricePerUnit =  static::pricePerUnit($meterRates);

        $amount = 0;
        foreach ($pricePerUnit as $item) {
            if (($totalUnit - $item['units']) > 0) {
                $amount += $item['units'] * $item['rate'];
                $totalUnit -= $item['units'];
            } else {
                $amount += $totalUnit * $item['rate'];
                $totalUnit -= $totalUnit;
            }
        }
        if ($totalUnit > 0) {
            $amount += $totalUnit * $item['rate'];
            $totalUnit -= $totalUnit;
        }
        if (!is_null($meter_type->tax_amount) && $amount > 0) {
            $percentageAmount = ($amount / 100) * $meter_type->tax_amount;
            $amount += $percentageAmount;
        }


        if (!is_null($meter_type->minimum_charges) && $totalUnit <= 0) {
            $amount += $meter_type->minimum_charges;
        }
        return $amount;
    }

    public static function pricePerUnit($meterRates) {
        $unitsPerRate = [];
        foreach ($meterRates as $meterRate) {

            $unitsPerRate[] = [
                'units' => ($meterRate->to - $meterRate->from),
                'rate' => $meterRate->rate
            ];
        }

        return $unitsPerRate;
    }
}