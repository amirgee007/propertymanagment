<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lot;
use App\Models\LotType;
use App\Models\Owner;
use App\Models\OwnerLot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
{

    public function show(){
        $lotTypes = LotType::all();
        return view('admin.admin-lots.add' , compact('lotTypes'));
    }

    public function deleteLotType($lot_type_id){

        try {

            LotType::where('lot_type_id' , $lot_type_id)->delete();
            Lot::where('lot_type_id' , $lot_type_id)->delete();
            flash('Successfully Deleted the LotType')->success();
            return back();

        } catch (\Exception $ex) {
            flash('Something went wrong')->error();
            return back();
        }

    }

    public function saveLotType(Request $request){

        try {

            $lotType = LotType::firstOrCreate($request->except('_token'));

            for ($i = 1; $i <= $request->lot_type_qty; $i++) {
            $name = $lotType->lot_type_code . $i;
            $lot = Lot::firstOrCreate(['lot_type_id' => $lotType->lot_type_id , 'lot_name' => $name]);
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

    public function assignLotShow(){

        $owners = Owner::all();
        $lots = Lot::all();
        $lotsTypes = LotType::all();
        return view('admin.owner-management.assignLot' , compact('owners' , 'lots' ,'lotsTypes'));
    }

    public function listOfAssignLot(){

        $current_owner = Auth::user()->owner ? Auth::user()->owner : null;
        if ($current_owner)
        $ownedLots =OwnerLot::where('owner_id',$current_owner->owner_id)->get();
        else
        $ownedLots =[];

        return view('admin.owner-management.listAssignLot' , compact('ownedLots'));

    }

    public function sellToOther(){
        return view('admin.owner-management.sellLot');

    }
    private function getLotTypeId($lot_id){

       $lot_type =  Lot::where('lot_id' , $lot_id)->first();
       if (isset($lot_type)){
           return $lot_type->lot_type_id;
       }
       else
           return 0;
    }

    public function assignLotSave(Request $request){

        $data = $request->except('_token');
        $data['lot_type_id'] = $this->getLotTypeId($request->lot_id);

        $isSaved = OwnerLot::firstOrCreate($data);

        if ($isSaved) {
            $response = ['status' => 'saved'];
        } else {
            $response = ['status' => 'error'];
        }
        return response()->json($response);

    }

    public function ajaxCall(Request $request){
        $assignedLotsIds = OwnerLot::pluck('lot_id');

        $lots = Lot::where('lot_type_id' ,$request->id)->whereNotIn('lot_id' ,$assignedLotsIds)->pluck('lot_name', 'lot_id');

        return $lots;

    }
}
