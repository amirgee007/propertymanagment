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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::paginate(10);

        return view('admin.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();
        $lots = Lot::all();

        return view('admin.invoices.add', compact('owners', 'lots'));
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

        return view('admin.invoices.show', compact('invoice'));
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
        $lots = Lot::all();

        return view('admin.invoices.edit', compact('owners', 'lots', 'invoice'));
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
}
