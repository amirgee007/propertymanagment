<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lot;
use App\Models\LotType;
use App\Models\Meter;
use App\Models\MeterReading;
use App\Models\MeterType;
use Illuminate\Http\Request;

class MeterReadingController extends Controller
{
    public function index() {
        $meterTypes = MeterType::get()->pluck('meter_name' , 'id')->toArray();
        $meters = Meter::with(['meterReadings' => function($q){
            $q->orderBy('last_reading_date' , 'desc');
        }])->paginate(15);

        return view('admin.meter-reading.index' , compact('meters' , 'meterTypes'));
    }

    public function create() {
        $meterTypes = MeterType::get()->pluck('meter_name' , 'id')->toArray();

        $lotTypes = LotType::get()->pluck('lot_type_name' , 'lot_type_id')->toArray();

        $lots = Lot::get()->pluck('lot_name' , 'lot_id');

        $meter = Meter::get()->pluck('id' , 'id')->toArray();

        return view('admin.meter-reading.create-meter-reading' ,
            compact('meterTypes' , 'lotTypes' , 'lots' , 'meter'));
    }

    public function store(Request $request) {

        $savableData = $request->except(['meter_type_id' , '_token' , 'type']);

        $meterReading = MeterReading::create($savableData);

        flash()->success('Reading taking Successfully of this '.$meterReading->meter_id.' Meter Id');
        if ($request->has('type') )
            return response()->json([
                'status' => 'hurray',
                'meterReading' => $meterReading
            ]);

        return back();
    }


    public function getLotsFromLotType(Request $request) {

        $lotType = LotType::findOrFail($request->id);
        $lots = $lotType->lots()->pluck('lot_name' , 'lot_id');

        return view('admin.meter-reading.partials.lots' , compact('lots'));
    }

    public function getLotsMeters(Request $request) {

        $meter = Meter::where('lot_id' , $request->id)
            ->where('meter_type_id' , $request->meter_type_id)
            ->get()->pluck('id' , 'id')->toArray();

        return view('admin.meter-reading.partials.meter' , compact('meter'));

    }



}
