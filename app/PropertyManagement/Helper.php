<?php

namespace App\PropertyManagement;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class Helper
{

    public static function lotName($ownedLot)
    {
        try {
            return $ownedLot->lot->lot_name;
        } catch (\Exception $ex) {
            return false;
        }

    }
}

