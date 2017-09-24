<?php

namespace App\PropertyManagement;

use App\Models\Lot;
use App\Models\Owner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class Helper
{
    /**
     * @param $ownedLot
     * @return bool
     */
    public static function lotName($ownedLot)
    {
        try {
            return $ownedLot->lot->lot_name;
        } catch (\Exception $ex) {
            return false;
        }

    }

    /**
     * @param $val
     * @param $percentage
     * @return float|int
     */
    public static function gstCalculate($val, $percentage)
    {
        if ($val > 0) {
            return ((($val / 100) * $percentage) - $val) + $val;
        } else
            return 0;
    }

    /**
     * @param Owner $owner
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public static function getOwnerLots(Owner $owner)
    {
        $ownerLots = collect();
        if (count($owner->ownedLots)) {
            $lot_ids = $owner->ownedLots->pluck('lot_id')->toArray();

            $ownerLots = Lot::whereIn('lot_id', $lot_ids)->paginate(10);
        }

        return $ownerLots;
    }

    /**
     * @param Owner $owner
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public static function getOwnerCarParks(Owner $owner)
    {
        $carParks = collect();
        if (count($owner->carParks))
            $carParks = $owner->carParks()->paginate(10);

        return $carParks;
    }
}

