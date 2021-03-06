<?php

namespace App\Http\Controllers\Admin;

use App\Models\MeterRate;
use App\Models\MeterType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeterController extends Controller
{
    protected $viewPath = 'admin.meter-management';

    public function index()
    {
        $randomNumber = random_int(000, 999);
        $meterTypes = MeterType::all();
        $meterRates = MeterRate::all();
        return view("{$this->viewPath}.index",
            compact('meterTypes', 'randomNumber', 'meterRates'));
    }

    public function create()
    {
        $randomNumber = random_int(000, 999);
        return view("{$this->viewPath}.create", compact('randomNumber'));
    }

    public function store(Request $request)
    {
        $data = $request->meterType;
        if(array_key_exists('is_taxable', $data)){
            $data['is_taxable'] = true;
        } else {
            $data['is_taxable'] = false;
            $data['tax_amount'] = 0;
        }

        $type = MeterType::create($data);

        $tax = !is_null($type->tax_amount) ? $type->tax_amount : 'N/A';
        $typeHtml = "<tr id=\"m-type-{$type->id}\">
                        <td>{$type->meter_name}</td>
                        <td>{$type->meter_code}</td>
                        <td>{$type->minimum_charges}</td>
                        <td>{$tax}</td>
                        <td>
                            <button data-url='" . route('meter.type.edit', [$type->id]) . "'  class='btn btn-default edit-meter-type'>edit</button>
                            <button data-url='" . route('meter.type.delete', [$type->id]) . "' class=\"btn btn-danger delete-meter-type\">delete</button>
                        </td>
                    </tr>";

        if ($request->has('viewType')) {
            flash('Successfully Created the Meter Type and Rate')->success();
            return redirect()->route('meter.index');
        }
        return response()->json([
            'status' => true,
            'meterType' => $typeHtml,
            'type' => $type
        ]);
    }


    public function deleteMeterType($id)
    {
        $type = MeterType::findOrFail($id);
        $type->delete();
        $meterTypes = MeterType::get()->pluck('meter_name', 'id');
        return response()->json([
            'status' => true,
            'id' => 'm-type-' . $id,
            'meterTypes' => $meterTypes
        ]);
    }

    public function meterTypeEdit($id)
    {
        $meterType = MeterType::findOrFail($id);

        return response()->json(['meterType' => $meterType]);
    }

    public function meterTypeUpdate(Request $request, $id)
    {
        $meterType = MeterType::findOrFail($id);

        $data = $request->meterType;
        if(array_key_exists('is_taxable', $data)){
            $data['is_taxable'] = true;
        } else {
            $data['is_taxable'] = false;
            $data['tax_amount'] = 0;
        }

        $meterType->update($data);

        $tax = !is_null($meterType->tax_amount) ? $meterType->tax_amount : 'N/A';

        $typeHtml = "
                        <td>{$meterType->meter_name}</td>
                        <td>{$meterType->meter_code}</td>
                        <td>{$meterType->minimum_charges}</td>
                        <td>{$tax}</td>
                        <td>
                            <button data-url='" . route('meter.type.edit', [$meterType->id]) . "'  class='btn btn-default edit-meter-type'>edit</button>
                            <button data-url='" . route('meter.type.delete', [$meterType->id]) . "' class=\"btn btn-danger delete-meter-type\">delete</button>
                        </td>
                    ";

        return response()->json([
            'html' => $typeHtml,
            'id' => $id
        ]);
    }

    public function meterRateEdit($id)
    {
        $meterRate = MeterRate::findOrFail($id);

        return view('admin.meter-management.partials.sub-partials.meter-rate-form', compact('meterRate'));
    }

    public function meterRateUpdate(Request $request, $id)
    {

        $meterRate = MeterRate::findOrFail($id);
        $meterRate->update($request->all());

        $typeHtml = "
                        <td>{$meterRate->id}</td>
                        <td>{$meterRate->from}</td>
                        <td>{$meterRate->to}</td>
                        <td>{$meterRate->rate}</td>
                        <td>
                            <button data-url='" . route('meter.rate.edit', [$meterRate->id]) . "'  class='btn btn-default edit-meter-rate'>edit</button>
                            <button data-url='" . route('meter.rate.delete', [$meterRate->id]) . "' class=\"btn btn-danger delete-meter-type\">delete</button>
                        </td>
                    ";

        return response()->json([
            'html' => $typeHtml,
            'id' => $id
        ]);
    }

    public function deleteMeterRate($id)
    {
        $type = MeterRate::findOrFail($id);
        $type->delete();
        return response()->json([
            'status' => true,
            'id' => 'm-rate-' . $id
        ]);
    }

    public function meterRateIndex()
    {
        $meterRates = MeterRate::all();

        return view('admin.meter-rate.index', compact('meterRates'));
    }

    public function meterRateCreate(Request $request)
    {
        $meterRate = MeterRate::create($request->all());

        $rateHtml = "<tr id=\"m-rate-{$meterRate->id}\">
                        <td>{$meterRate->meter_type_name}</td>
                        <td>{$meterRate->from}</td>
                        <td>{$meterRate->to}</td>
                        <td>{$meterRate->rate}</td>
                        <td>
                            <button data-url='" . route('meter.rate.edit', [$meterRate->id]) . "'  class='btn btn-default edit-meter-type'>edit</button>
                            <button data-url='" . route('meter.rate.delete', [$meterRate->id]) . "' class=\"btn btn-danger delete-meter-type\">delete</button>
                        </td>
                    </tr>";

        return response()->json([
            'status' => true,
            'meterRate' => $rateHtml,
            'rate' => $meterRate
        ]);

    }


}
