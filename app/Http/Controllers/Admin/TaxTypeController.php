<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaxType;
use Illuminate\Http\Request;

class TaxTypeController extends Controller
{
    function __construct()
    {
        $this->middleware('AdminRole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxTypes = TaxType::paginate(10);

        return view('admin.tax-types.index', compact('taxTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax-types.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);

        try {
            TaxType::create($request->except('_token'));

            flash('Tax type created successfully.')->success();
            return redirect()->route('tax-types.index');
        } catch (\Exception $e) {
            flash('Error while creating tax type.')->error();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxType = TaxType::find($id);

        if (is_null($taxType)) {
            flash('Tax type not found');
            return back();
        }

        return view('admin.tax-types.edit', compact('taxType'));
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
        $taxType = TaxType::find($id);

        if (is_null($taxType)) {
            flash('Tax type not found');
            return back();
        }

        $this->formValidation($request);

        try {
            $taxType->update($request->except('_token'));

            flash('Tax type updated successfully.')->success();
            return redirect()->route('tax-types.index');
        } catch (\Exception $e) {
            flash('Error while updating tax type.')->error();
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
        //
    }

    /**
     * @param Request $request
     */
    private function formValidation(Request $request)
    {
        if ($request->has('status'))
            $request['status'] = 1;
        else
            $request['status'] = 0;

        $this->validate($request, [
            'name' => 'required|string',
            'rate' => 'required|integer'
        ]);
    }
}
