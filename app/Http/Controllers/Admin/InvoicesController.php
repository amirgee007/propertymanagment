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
     * Page of create new invoice
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $owners = Owner::all();
        $lots = Lot::all();

        return view('admin.invoices.add', compact('owners', 'lots'));
    }


    public function store(Request $request)
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

        try {
            $request['date'] = Carbon::parse($request->date);
            Invoice::create($request->except('_token'));

            flash('Invoice created successfully.')->success();
            return back();
        } catch (\Exception $e) {
            flash('Error while creating invoice.')->error();
            return back();
        }
    }

}
