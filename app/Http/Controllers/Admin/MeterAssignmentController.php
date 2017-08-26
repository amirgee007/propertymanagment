<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LotType;
use App\Models\Meter;
use App\Models\MeterType;
use Illuminate\Http\Request;

class MeterAssignmentController extends Controller
{
    public function index() {
        $meters = Meter::with('meterType' , 'lotType')->get();

        $meterTypes = MeterType::get()->pluck('meter_name' ,'id' )->toArray();

        $lotTypes = LotType::get()->pluck('lot_type_name', 'lot_type_id')->toArray();

        return view('admin.meter-assignment.index' ,
            compact('meterTypes' , 'lotTypes' , 'meters'));

    }

    public function store(Request $request) {

        $meter = Meter::create($request->all());

        $html = "<tr id=\"assign-meter-tr-{$meter->id}\">
                                <td>{$meter->meterType->meter_name}</td>
                                <td>{$meter->lotType->lot_type_name}</td>
                                <td>{$meter->quantity}</td>
                                <td>
                                    <button data-url='".route('meter.assignment.delete' , [$meter->id])."' class=\"btn btn-danger meter-delete\">Delete</button>
                                </td>
                            </tr>";

        return response()->json([
            'html' => $html,
            'id' => $meter->id,
            'status' => true
        ]);
    }

    public function delete($id) {
        $meter = Meter::findOrFail($id);
        $meter->delete();

        return response()->json([
            'id' => $id,
            'status' => true
        ]);
    }





}
