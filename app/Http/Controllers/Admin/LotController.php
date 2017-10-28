<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Lot;
use App\Models\LotType;
use App\Models\Owner;
use App\Models\OwnerLot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{

    public function show()
    {
        $lotTypes = LotType::all();
        return view('admin.admin-lots.add', compact('lotTypes'));
    }

    public function showLotsTable($lot_type_id)
    {
        $lots = Lot::where('lot_type_id' ,$lot_type_id)->get();
        return view('admin.admin-lots.show', compact('lots'));
    }

    public function deleteLot($lot_id) {
        Lot::where('lot_id' , $lot_id)->delete();
        OwnerLot::where('lot_type_id', $lot_id)->delete();

        return response()->json(['status' => true , 'id' => $lot_id]);
    }

    public function edit($id) {
        $lotType = LotType::findOrFail($id);
        return view('admin.admin-lots.edit', compact('lotType'));
    }

    public function update(Request $request , $id)
    {
        $lotType = LotType::findOrFail($id);

        $lots = Lot::where('lot_type_id' ,$id)->orderBy('lot_id' , 'desc')->get();

        if ($request->has('lot_type_qty') && $request->get('lot_type_qty') !=  $lotType->lot_type_qty ){
            if (($Dqty = ($lotType->lot_type_qty - $request->get('lot_type_qty'))) > 0 ) {

                $count = 0;
                foreach ($lots as $lot){
                    $lot->delete();
                    $count++;
                    if ($count == $Dqty)
                        break;
                }

            }elseif (($Aqty = ($request->get('lot_type_qty') - $lotType->lot_type_qty))  > 0 ) {
                $addition = count($lots);
                for ($i = 1 + $addition ;$i <= $Aqty + $addition; $i++) {
                    Lot::create([
                        'lot_type_id' => $lotType->lot_type_id,
                        'lot_name' => $lotType->lot_type_code.$i,
                    ]);
                }
            }
        }

        $lotType->update($request->all());

        flash('SuccessFully updated')->success();

        return redirect()->route('get.lot.manage');

    }

    public function deleteLotType($lot_type_id)
    {
        try {

            LotType::where('lot_type_id', $lot_type_id)->delete();
            Lot::where('lot_type_id', $lot_type_id)->delete();
            OwnerLot::where('lot_type_id', $lot_type_id)->delete();
            flash('Successfully Deleted the LotType Lots as well as Owner Lots')->success();
            return back();

        } catch (\Exception $ex) {
            flash('Something went wrong')->error();
            return back();
        }

    }

    public function saveLotType(Request $request)
    {
        $this->validate($request, [
            'lot_type_name'         => 'required|unique:lot_types|max:255',
            'lot_type_description'  => 'required',
            'lot_type_code'         => 'required|string|max:255',
            'lot_type_size'         => 'required|string|max:255',
            'lot_type_qty'          => 'required|integer',
        ]);

        try {
            $lotType = LotType::create($request->except('_token'));

            for ($i = 1; $i <= $lotType->lot_type_qty; $i++) {
                Lot::firstOrCreate([
                    'lot_name' => $lotType->lot_type_code . $i,
                    'lot_type_id' => $lotType->lot_type_id
                ]);
            }

            flash('Successfully Created the LotType')->success();
            return back();

        } catch (\Exception $ex) {
            flash('Something went wrong')->error();
            return back();
        }

    }

    public function assignLotShow()
    {
        $owners = Owner::all();
        $lots = Lot::all();
        $lotsTypes = LotType::all();
        return view('admin.owner-management.assignLot', compact('owners', 'lots', 'lotsTypes'));
    }

    public function listOfAssignLot()
    {

        $current_owner = Auth::user()->owner ? Auth::user()->owner : null;
        if ($current_owner)
            $ownedLots = OwnerLot::where('lot_owner_id', $current_owner->owner_id)->get();
        else
            $ownedLots = [];

        return view('admin.owner-management.listAssignLot', compact('ownedLots' , 'current_owner'));

    }

    public function sellToOther()
    {
        $owners = Owner::all();

        return view('admin.owner-management.sellLot', compact('owners'));
    }

    public function sellToOtherStore(Request $request)
    {
        $this->validate($request, [
            'old_owner_id' => 'required',
            'owner_lots' => 'required',
        ]);

        $lots = OwnerLot::where('lot_owner_id', $request->old_owner_id)
            ->whereIn('lot_id' , $request->owner_lots)->get();

        if ($request->get('owner-choice') == 'new') {
            $savableOwner = new Owner();
            $savableOwner = Owner::saveOwnerData($request, $savableOwner);
        } else {
            $savableOwner = Owner::findOrFail($request->get('choosen-owner'));
        }

        if (count($lots)) {
            foreach ($lots as $lot) {
                $lot->update(['lot_owner_id' => $savableOwner->owner_id]);
            }
        }

        if (isset($request->is_company) && ($request->get('owner-choice') == 'new')) {

            $ownerId = !is_null($savableOwner->owner_id) ? $savableOwner->owner_id : null;
            $savableCompany = new Company();
            $savableCompany = Company::saveCompanyData($request, $savableCompany, $ownerId);
        }

        flash('Successfully Sell lots to the Owner')->success();
        return back();
    }

    public function checkOwnerBills(Request $request)
    {
        $owner_bills = Invoice::where('owner_id', $request->id)
            ->where('invoice_status', 'unpaid')
            ->with('owner', 'lot')
            ->get();

        $owner_lots = Owner::where('owner_id', $request->id)
            ->first()->ownerLots;


        return response()->json([
            'owner_bills' => $owner_bills,
            'owner_lots' => $owner_lots
        ]);
    }

    private function getLotTypeId($lot_id)
    {
        $lot_type = Lot::where('lot_id', $lot_id)->first();
        if (isset($lot_type)) {
            return $lot_type->lot_type_id;
        } else
            return 0;
    }

    public function assignLotSave(Request $request)
    {
        $this->validate($request, [
            'lot_id'            => 'required',
            'lot_type_id'       => 'required',
            'lot_owner_id'      => 'required'
        ]);

        $data = $request->except('_token');
        foreach ($data['lot_id'] as $lot_id) {
            $lot_detail = array(
                'lot_id' => $lot_id,
                'lot_type_id' => $data['lot_type_id'],
                'lot_owner_id' => $data['lot_owner_id']
            );

            $isSaved = new OwnerLot($lot_detail);
            $isSaved->save();
        }

        flash('Successfully lots Assigned to Owner')->success();
        return back();
//        if ($isSaved) {
//            $response = ['status' => 'saved'];
//        } else {
//            $response = ['status' => 'error'];
//        }
//
//        return response()->json($response);
    }

    public function ajaxCall(Request $request)
    {
        $assignedLotsIds = OwnerLot::pluck('lot_id');

        $lots = Lot::where('lot_type_id', $request->id)->whereNotIn('lot_id', $assignedLotsIds)->pluck('lot_name', 'lot_id');

        return $lots;

    }

    public  function getLotManage(){


        $lot_type = LotType::with(['lots' => function($q){
            $q->orderBy('created_at' , 'desc');
        }]);

        $searchVal = '';
        if (\request()->has('search') && !empty(trim(\request()->search))) {
            $lot_type = $lot_type->orWhere('lot_type_id' , \request()->search)
                ->orWhere('lot_type_name' , \request()->search)
                ->orWhere('lot_type_description' , \request()->search)
                ->orWhere('lot_type_code' , \request()->search)
                ->orWhere('lot_type_size' , \request()->search)
                ->orWhere('lot_type_qty' , \request()->search);
            $searchVal = \request()->search;
        }

        $lot_type = $lot_type->paginate(15);

        return view('admin.admin-lots.index' , compact('lot_type' , 'searchVal'));


    }

}
