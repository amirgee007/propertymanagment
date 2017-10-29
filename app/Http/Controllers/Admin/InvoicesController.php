<?php

namespace App\Http\Controllers\Admin;

use App\Models\InvoicePayment;
use App\Models\Meter;
use App\Models\SinkingFund;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Validator;
use App\Models\Invoice;
use App\Models\Lot;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{

    private $view;


    function __construct($view = 'admin.invoices')
    {
//        $this->middleware('ManagerRole');
        $this->middleware('OwnerRole');


        $this->view = $view;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Owner')) {
            $owner_ids = Owner::where('user_id', $user->id)->pluck('owner_id');
            $invoices = Invoice::whereIn('owner_id', $owner_ids)->get();
        } else {
            $invoices = Invoice::all();
        }

        return view($this->view . '.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();

        return view($this->view . '.add', compact('owners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidate($request);

        try {
            $request['date'] = Carbon::parse($request->date);
            Invoice::create($request->except('_token'));

            flash('Invoice created successfully.')->success();
            return redirect()->route('invoices.index');
        } catch (\Exception $e) {
            flash('Error while creating invoice.')->error();
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        $payments = $invoice->payments()->paginate(10);

        return view($this->view . '.show', compact('invoice', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $owners = Owner::all();
        $lots = Owner::find($invoice->owner_id)->ownedLots;

        return view($this->view . '.edit', compact('owners', 'lots', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $this->formValidate($request);

        try {
            $request['date'] = Carbon::parse($request->date);
            $invoice->update($request->except('_token'));

            flash('Invoice updated successfully.')->success();
            return back();
        } catch (\Exception $e) {
            flash('Error while updating invoice.')->error();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);

        if (!$invoice) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invoice not found.'
            ]);
        } else {
            $invoice->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Invoice deleted successfully.'
            ]);
        }
    }

    /**
     * @param Request $request
     */
    private function formValidate(Request $request)
    {
        $this->validate($request, [
            'owner_id' => 'required|exists:owners,owner_id',
            'lot_id' => 'required|exists:lots,lot_id',
            'invoice_quantity' => 'required|numeric',
            'date' => 'required|date',
            'invoice_trans_des' => 'required',
            'invoice_uom' => 'required|string',
            'invoice_charge_rate' => 'required|numeric',
            'invoice_amount' => 'required|numeric',
            'type' => 'required',
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOwnerLots(Request $request)
    {
        if (!$request->has('owner_id'))
            return response()->json(['status' => false]);

        $owner = Owner::find($request->owner_id);
        if (!$owner)
            return response()->json(['status' => false]);

        $lots = $owner->ownedLots;
        return response()->json([
            'status' => true,
            'view' => (string)view($this->view . '.partials.lot_select', compact('lots'))
        ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPDF($id)
    {
        $invoice = Invoice::find($id);
        $pdf = \App::make('snappy.pdf.wrapper');

//        return view('admin.reports.pdf', compact('invoice'));

        if ($invoice->type == Invoice::UTILITY) {

            $meter = Meter::where('id', $invoice->model_id)
                ->with('lot.lotType', 'meterReadings', 'meterType.meterRates')->first();
            $pdf->loadView('admin.reports.utility-template', compact('meter', 'invoice'));

        } elseif ($invoice->type == Invoice::SINKING) {

            $sinkingFunds = SinkingFund::where('lot_id', $invoice->lot_id)->get();

            $pdf->loadView('admin.reports.sinking-fund', compact('sinkingFunds', 'invoice'));
        } else {
            $pdf->loadView('admin.reports.pdf', compact('invoice'));
        }

        $file_name = 'INV' . $invoice->invoice_id . ' ' . @Carbon::parse($invoice->date)->format('M Y') . '.pdf';

        return $pdf->download($file_name);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordPayment(Request $request)
    {
        $this->validate($request, [
            'invoice_id' => 'required|exists:invoices,invoice_id',
            'owner_id' => 'required|exists:owners,owner_id',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
            'method' => 'required',
        ]);

        try {
            $request['payment_date'] = Carbon::parse($request->payment_date);

            InvoicePayment::create($request->except('_token'));

            return response()->json([
                'success' => true,
                'message' => 'Invoice Payment added successfully'
            ]);
        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error while saving invoice payment.'
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMailPayment(Request $request)
    {
        $this->validate($request, [
            'payment_id' => 'required|exists:invoice_payments,invoice_payment_id',
            'invoice_id' => 'required|exists:invoices,invoice_id',
            'email_to' => 'required|email',
            'from_email' => 'required|email',
        ]);

        $payment = InvoicePayment::find($request->payment_id);
        $invoice = Invoice::find($request->invoice_id);

        try {

            if ($request->has('delivery')) {
                Notification::send($invoice, new \App\Notifications\InvoicePaid($payment, $request->message));
            }

            Notification::send($payment, new \App\Notifications\InvoicePaid($payment, $request->message));

            return response()->json([
                'success' => true,
                'message' => 'The Recipient has been Sent.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error while sending Recipient.'
            ]);
        }
    }
}
