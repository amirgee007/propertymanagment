<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Models\Lot;
use App\Models\SinkingFund;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SinkingFundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinkingFunds = SinkingFund::all();

        return view('admin.sinking-funds.index', compact('sinkingFunds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lots = Lot::has('ownerWithLot')->get();

        return view('admin.sinking-funds.add', compact('lots'));
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
            $fund = SinkingFund::create($request->except('_token'));

            Invoice::generateFromSinkingFund($fund);

            flash('Fund created successfully.')->success();
            return redirect()->route('sinking-funds.index');
        } catch (\Exception $e) {
            flash('Error while creating sinking fund.')->error();
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
        $fund = SinkingFund::findOrFail($id);

        $lots = Lot::has('ownerWithLot')->get();

        return view('admin.sinking-funds.show', compact('lots', 'fund'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fund = SinkingFund::findOrFail($id);

        $lots = Lot::has('ownerWithLot')->get();

        return view('admin.sinking-funds.edit', compact('lots', 'fund'));
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
        $this->formValidate($request);

        try {

            $fund = SinkingFund::find($id);
            $fund->update($request->except('_token'));

            flash('Fund updated successfully.')->success();
            return redirect()->route('sinking-funds.index');
        } catch (\Exception $e) {
            flash('Error while updating sinking fund.')->error();
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
        $fund = SinkingFund::find($id);

        if (!$fund) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sinking Fund not found.'
            ]);
        } else {
            $fund->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Sinking Fund deleted successfully.'
            ]);
        }
    }

    /**
     * @param Request $request
     */
    private function formValidate(Request $request)
    {
        $this->validate($request, [
            'lot_id' => 'required|exists:lots,lot_id',
            'amount' => 'required|numeric'
        ]);

        if ($request->has('date'))
            $request['date'] = $request->date == '' ? null : Carbon::parse($request->date);

    }
}
