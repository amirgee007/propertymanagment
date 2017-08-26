<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MeterReading;
use Illuminate\Http\Request;

class MeterReadingController extends Controller
{
    public function index() {
        $meterReadings = MeterReading::all();
        return view('admin.meter-reading.index' , compact('meterReadings'));
    }
}
