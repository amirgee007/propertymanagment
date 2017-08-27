<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
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
        $this->view = $view;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);

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

        return view($this->view . '.show', compact('invoice'));
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

    public function getPDF($id)
    {
        $invoice = Invoice::find($id);

//        return view('admin.reports.pdf', compact('invoice'));

        $pdf = \App::make('snappy.pdf.wrapper');
        $pdf->loadView('admin.reports.pdf', $invoice);

        $file_name = @$invoice->owner->owner_name . '-' . $invoice->id . '.pdf';

        return $pdf->download($file_name);
    }
}
