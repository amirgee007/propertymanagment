<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LotType;
use App\Models\Meter;
use App\Models\MeterAssignment;
use App\Models\MeterType;
use Illuminate\Http\Request;

class MeterAssignmentController extends Controller
{
    public function index() {
        $meters = MeterAssignment::with('meterType' , 'lotType')->get();

        $meterTypes = MeterType::get()->pluck('meter_name' ,'id' )->toArray();

        $lotTypes = LotType::get()->pluck('lot_type_name', 'lot_type_id')->toArray();

        return view('admin.meter-assignment.index' ,
            compact('meterTypes' , 'lotTypes' , 'meters'));

    }

    public function store(Request $request) {

        $meter = MeterAssignment::create($request->all());

        $lots = LotType::findOrFail($meter->lot_type_id)->lots;

        foreach ($lots as $lot) {
            $data = [
                'meter_assignment_id' => $meter->id,
                'meter_type_id' => $meter->meter_type_id,
                'lot_id' => $lot->lot_id,
            ];
            for ($i = 1;$i <= $meter->quantity ; $i++) {
                Meter::create($data);
            }
        }

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
        $meter = MeterAssignment::findOrFail($id);
        $meter->delete();

        return response()->json([
            'id' => $id,
            'status' => true
        ]);
    }





}
