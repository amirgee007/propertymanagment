<?php

namespace App\Http\Controllers\Admin;

use App\Models\MeterRate;
use App\Models\MeterType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeterController extends Controller
{
    protected $viewPath = 'admin.meter-management';

    public function index() {
        $randomNumber = random_int(000 ,999);
        $meterTypes = MeterType::all();
        $meterRates = MeterRate::all();
        return view("{$this->viewPath}.index" ,
            compact('meterTypes' , 'randomNumber' , 'meterRates'));
    }

    public function create() {
        $randomNumber = random_int(000 ,999);
        return view("{$this->viewPath}.create" , compact('randomNumber'));
    }

    public function store(Request $request) {

        $type = MeterType::create($request->meterType);

        $meterRate = array_merge($request->meter_rate , ['meter_type_id' => $type->id  , 'meter_number' => $type->meter_code]);
        $meterRate = MeterRate::create($meterRate);

        $tax = !is_null($type->tax_amount)?$type->tax_amount:'N/A' ;
        $typeHtml = "<tr id=\"m-type-{$type->id}\">
                        <td>{$type->meter_name}</td>
                        <td>{$type->meter_code}</td>
                        <td>{$type->minimum_charges}</td>
                        <td>{$tax}</td>
                        <td>
                            <a href=\"#\" class=\"btn btn-default\">edit</a>
                            <a href=\"#\" class=\"btn btn-danger\">delete</a>
                        </td>
                    </tr>";

        $rateHtml = "<tr id=\"m-rate-{$meterRate->id}\">
                        <td>{$meterRate->id}</td>
                        <td>{$meterRate->from}</td>
                        <td>{$meterRate->to}</td>
                        <td>{$meterRate->rate}</td>
                        <td>
                            <a href=\"#\" class=\"btn btn-default\">edit</a>
                            <a href=\"#\" class=\"btn btn-danger\">delete</a>
                        </td>
                    </tr>";

        if ($request->has('viewType')){
            flash('Successfully Created the Meter Type and Rate')->success();
            return redirect()->route('meter.index');
        }
        return response()->json([
            'status' => true,
            'meterType' => $typeHtml,
            'meterRate' => $rateHtml,
        ]);
    }


    public function deleteMeterType($id) {
        $type = MeterType::findOrFail($id);
        $type->delete();
        return response()->json([
            'status' => true,
            'id' => 'm-type-'.$id
        ]);
    }


    public function deleteMeterRate($id) {
        $type = MeterRate::findOrFail($id);
        $type->delete();
        return response()->json([
            'status' => true,
            'id' => 'm-rate-'.$id
        ]);
    }
}
