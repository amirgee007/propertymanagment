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
        $lots = OwnerLot::where('lot_owner_id', $request->old_owner_id)
            ->whereIn('lot_id' , $request->owner_lots)->get();

        $savableOwner = new Owner();
        $savableOwner->owner_type = isset($request->owner_type) ? $request->owner_type : '';
        $savableOwner->owner_id_card_no = isset($request->owner_id_card_no) ? $request->owner_id_card_no : '';
        $savableOwner->owner_name = isset($request->owner_name) ? $request->owner_name : '';
        $savableOwner->owner_dob = isset($request->owner_dob) ? $request->owner_dob : '';
        $savableOwner->owner_gender = isset($request->owner_gender) ? $request->owner_gender : '';
        $savableOwner->owner_address = isset($request->owner_address) ? $request->owner_address : '';
        $savableOwner->owner_phone1 = isset($request->owner_phone1) ? $request->owner_phone1 : '';
        $savableOwner->owner_phone2 = isset($request->owner_phone2) ? $request->owner_phone2 : '';
        $savableOwner->is_company = isset($request->is_company) ? $request->is_company : false;
        $savableOwner->user_id = (Auth::user()) ? Auth::user()->id : '0';
        $savableOwner->save();

        if ($lots) {
            foreach ($lots as $lot) {
                $lot->update(['lot_owner_id' => $savableOwner->owner_id]);
            }
        }

        if (isset($request->is_company)) {

            $savableCompany = new Company();
            $savableCompany->comp_name = !is_null($savableOwner->owner_id) ? $savableOwner->owner_id : '';
            $savableCompany->owner_id = isset($request->comp_name) ? $request->comp_name : '';
            $savableCompany->comp_address = isset($request->comp_address) ? $request->comp_address : '';
            $savableCompany->comp_reg_no = isset($request->comp_reg_no) ? $request->comp_reg_no : '';
            $savableCompany->comp_telephone_no = isset($request->comp_telephone_no) ? $request->comp_telephone_no : '';
            $savableCompany->comp_fax_no = isset($request->comp_fax_no) ? $request->comp_fax_no : '';
            $savableCompany->comp_contact_person = isset($request->comp_contact_person) ? $request->comp_contact_person : '';
            $savableCompany->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
            $savableCompany->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
            $savableCompany->save();
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

        if ($isSaved) {
            $response = ['status' => 'saved'];
        } else {
            $response = ['status' => 'error'];
        }
        return response()->json($response);

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
