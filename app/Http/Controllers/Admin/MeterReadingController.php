<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Lot;
use App\Models\LotType;
use App\Models\Meter;
use App\Models\MeterReading;
use App\Models\MeterType;
use App\Models\OwnerLot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MeterReadingController extends Controller
{
    public function index() {
        $meterTypes = MeterType::get()->pluck('meter_name' , 'id')->toArray();
        $meterOwners = OwnerLot::distinct()->get()->pluck('lot_id' , 'lot_id')->toArray();

        $meters = Meter::whereIn('lot_id' , $meterOwners);
        $searchVal = '';

        if (\request()->has('search') && !empty(trim(\request()->search))) {

            $meters = $meters->where(function($q) {
                $q->orWhere('id' , \request()->search)
                    ->orWhereHas('lot' , function($q){
                        $q->where('lot_name' ,"like", "%".\request()->search."%");
                    });
            });
            $searchVal = \request()->search;
        }
        $meters = $meters->paginate(15);

        return view('admin.meter-reading.index' , compact('meters' , 'meterTypes' , 'searchVal'));

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

        $meter = $meterReading->meter;

        /////generate Invoice///////
        $owner = $meter->owner();
        $invoiceData = [
            'owner_id' => $owner->owner_id,
            'lot_id' => $meter->lot_id,
            'date' => Carbon::now()->toDateString(),
            'invoice_trans_des' => $meter->meterType->meter_name." bill",
            'invoice_quantity' => '1',
            'invoice_uom' => '',
            'type' => 'utility',
            'model_id' => $meter->id,
            'invoice_charge_rate' => 0,
            'invoice_amount' => ($meter->currentAmount() == 'N/A')?0:$meter->currentAmount(),
            'invoice_status' => 'unpaid'
        ];

        $invoice = Invoice::create($invoiceData);

         $meterReading->update(['invoice_id' => $invoice->invoice_id]);

        flash()->success('Reading taking Successfully of this '.$meterReading->meter_id.' Meter Id');
        if ($request->has('type') )
            return response()->json([
                'status' => 'hurray'
            ]);

        return back();
    }


    public function getLotsFromLotType(Request $request) {

        $meterOwners = OwnerLot::distinct()->get()->pluck('lot_id' , 'lot_id')->toArray();

        $lotType = LotType::findOrFail($request->id);
        $lots = $lotType->lots()->whereIn('lot_id' , $meterOwners)->pluck('lot_name' , 'lot_id');

        return view('admin.meter-reading.partials.lots' , compact('lots'));
    }

    public function getLotsMeters(Request $request) {

        $meterOwners = OwnerLot::distinct()->get()->pluck('lot_id' , 'lot_id')->toArray();

        $meter = Meter::where('lot_id' , $request->id)->where('meter_type_id' , $request->meter_type_id)
            ->whereIn('lot_id' , $meterOwners)->get()->pluck('id' , 'id')->toArray();

        return view('admin.meter-reading.partials.meter' , compact('meter'));

    }

    public function getInvoiceBill($id) {
        $pdf = \App::make('snappy.pdf.wrapper');
        $meterReadings = MeterReading::where('meter_id' , $id)->orderBy('reading_date' , 'asc')->get();

        $data = [];

        foreach ($meterReadings as $meterReading) {
            $previousReading = is_null($meterReading->previousReading())?0:$meterReading->previousReading()->last_reading;
            $data[] = [
                'month' => Carbon::parse($meterReading->reading_date)->format('F'),
                'reading_date' => $meterReading->reading_date,
                'previous' => $previousReading,
                'current' => $meterReading->last_reading,
                'usage' => $meterReading->last_reading - $previousReading,
                'amount' => $meterReading->readingAmount()
            ];
        }
        $meter = isset($meterReading)?$meterReading->meter:[];
        $pdf->loadView('admin.reports.meter-annual-report' , compact('data' , 'meter'));

        $file_name = @$meter->owner()->owner_name . '-' . $meter->id . '.pdf';

        return $pdf->download($file_name);
    }

    public function previousReadings($id) {
        $meterReadings = MeterReading::where('meter_id' , $id)->orderBy('reading_date' , 'asc')->get();

        $data = [];

        foreach ($meterReadings as $meterReading) {
            $previousReading = is_null($meterReading->previousReading())?0:$meterReading->previousReading()->last_reading;
            $data[] = [
                'month' => Carbon::parse($meterReading->reading_date)->format('F'),
                'reading_date' => $meterReading->reading_date,
                'previous' => $previousReading,
                'current' => $meterReading->last_reading,
                'usage' => $meterReading->last_reading - $previousReading,
                'amount' => $meterReading->readingAmount()
            ];
        }
        $meter = isset($meterReading)?$meterReading->meter:[];

        return view('admin.meter-reading.partials.meterAnualReading' , compact('data' , 'meter'));

    }





}
