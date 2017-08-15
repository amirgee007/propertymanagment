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

    public function deleteLotType($lot_type_id)
    {

        try {

            LotType::where('lot_type_id', $lot_type_id)->delete();
            Lot::where('lot_type_id', $lot_type_id)->delete();
            flash('Successfully Deleted the LotType')->success();
            return back();

        } catch (\Exception $ex) {
            flash('Something went wrong')->error();
            return back();
        }

    }

    public function saveLotType(Request $request)
    {

        try {

            $lotType = LotType::firstOrCreate($request->except('_token'));

            for ($i = 1; $i <= $request->lot_type_qty; $i++) {
                $name = $lotType->lot_type_code . $i;
                $lot = Lot::firstOrCreate(['lot_type_id' => $lotType->lot_type_id, 'lot_name' => $name]);
                $lot->lot_type_id = $lotType->lot_type_id;
                $lot->lot_name = $name;
                $lot->save();
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

        return view('admin.owner-management.listAssignLot', compact('ownedLots'));

    }

    public function sellToOther()
    {
        $owners = Owner::all();

        return view('admin.owner-management.sellLot', compact('owners'));
    }

    public function sellToOtherStore(Request $request)
    {
        $lots = OwnerLot::where('lot_owner_id', $request->old_owner_id)->get();

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

        if($lots){
            foreach ($lots as $lot){
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

        $owner_lots = OwnerLot::where('lot_owner_id', $request->id)
            ->get();

        if ($owner_bills && $owner_lots->isEmpty())
            return response()->json([
                'owner_bills' => $owner_bills
            ]);
        else
            return response()->json([
                'owner_bills' => true,
                'owner_lots' => !$owner_lots->isEmpty()
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
        foreach($data['lot_id'] as $lot_id) {
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
}
