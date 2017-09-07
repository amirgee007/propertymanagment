<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Lot;
use App\Models\LotType;
use App\Models\Owner;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('OwnerRole');
    }

    public function index()
    {
        $owners = Owner::paginate(10);

        return view('admin.owner-management.index', compact('owners'));
    }

    public function viewProfile()
    {
        return view('admin.owner-management.add');
    }

    public function cardCheck(Request $request)
    {
        $data = Owner::where($request->key,$request->value)->first();
        if($data){
            return 'match';
        }else{
            return 'no_match';
        }
    }


    public function show($id)
    {
        $owner = Owner::find($id);

        if (is_null($owner)) {

            flash('First Add owners Info')->warning();
            redirect()->route('owner.add.new');
        }

        $company = count($owner->companies) ? $owner->companies->first() : '';

        //$ob = (Owner::first()->owner_dob);
        //dd(Carbon::parse($ob)->diffInYears(Carbon::now()));

        return view('admin.owner-management.show', compact('company', 'owner'));

    }


    public function store(Request $request)
    {
        $this->formValidation($request);

        $ownerId = null;
        $savableOwner = new Owner();
        $savableOwner->owner_type = isset($request->owner_type) ? $request->owner_type : '';
        $savableOwner->owner_id_card_no = isset($request->owner_id_card_no) ? $request->owner_id_card_no : '';
        $savableOwner->owner_name = isset($request->owner_name) ? $request->owner_name : '';
        $savableOwner->email = isset($request->email) ? $request->email : null;
        $savableOwner->owner_dob = isset($request->owner_dob) ? $request->owner_dob : '';
        $savableOwner->owner_gender = isset($request->owner_gender) ? $request->owner_gender : '';
        $savableOwner->owner_address = isset($request->owner_address) ? $request->owner_address : '';
        $savableOwner->owner_phone1 = isset($request->owner_phone1) ? $request->owner_phone1 : '';
        $savableOwner->owner_phone2 = isset($request->owner_phone2) ? $request->owner_phone2 : '';
        $savableOwner->is_company = isset($request->is_company) ? $request->is_company : false;
        $savableOwner->user_id = (Auth::user()) ? Auth::user()->id : '0';
        $savableOwner->save();
        $ownerId = $savableOwner->id;


        if (isset($request->is_company)) {

            $savableCompany = new Company();
            $savableCompany->comp_name = !is_null($ownerId) ? $ownerId : '';
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

        flash('Successfully Created the Owner')->success();
        return back();
    }

    public function edit($id)
    {
        $owner = Owner::find($id);

        if (is_null($owner)) {
            flash('First Add owners Info')->warning();
            return redirect('/dashboard/owner/add');
        }

        $company = isset($owner->companies) ? $owner->companies->first() : '';

        $lots = Lot::all();
        $lotType = LotType::all();

        return view('admin.owner-management.edit', compact('lotType','lots','company', 'owner'));

    }

    public function update(Request $request)
    {
        $this->formValidation($request);

        $ownerId = null;
        $savableOwner = Owner::where('owner_id', $request->owner_id)->first();
        $savableOwner->owner_type = isset($request->owner_type) ? $request->owner_type : '';
        $savableOwner->owner_id_card_no = isset($request->owner_id_card_no) ? $request->owner_id_card_no : '';
        $savableOwner->owner_name = isset($request->owner_name) ? $request->owner_name : '';
        $savableOwner->email = isset($request->email) ? $request->email : null;
        $savableOwner->owner_dob = isset($request->owner_dob) ? $request->owner_dob : '';
        $savableOwner->owner_gender = isset($request->owner_gender) ? $request->owner_gender : '';
        $savableOwner->owner_address = isset($request->owner_address) ? $request->owner_address : '';
        $savableOwner->owner_phone1 = isset($request->owner_phone1) ? $request->owner_phone1 : '';
        $savableOwner->owner_phone2 = isset($request->owner_phone2) ? $request->owner_phone2 : '';
        $savableOwner->is_company = isset($request->is_company) ? $request->is_company : false;
        $savableOwner->user_id = (Auth::user()) ? Auth::user()->id : '0';
        $savableOwner->save();
        $ownerId = $savableOwner->owner_id;


        if (isset($request->is_company)) {

            $savableCompany = Company::where('comp_id', $request->company_id)->first();

            $savableCompany->comp_name = !is_null($ownerId) ? $ownerId : '';
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

        flash('Successfully Updated the Owner')->success();
        return back();

    }

    public function verify(Request $request)
    {

        $email = $request->email;
        $pass = $request->password;

        $user = User::where('email', $email)->first();

        if (!is_null($user)) {
            $user->update(['password' => bcrypt($pass)]);

            flash('Successfully Updated the password')->success();
            return back();
        }
        flash('Something went wrong')->error();
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $owner = Owner::find($id);

        if (!$owner) {
            return response()->json([
                'status' => 'error',
                'message' => 'Owner not found.'
            ]);
        } else {
            $owner->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Owner deleted successfully.'
            ]);
        }
    }

    /**
     * @param Request $request
     */
    private function formValidation(Request $request)
    {
        $email_rule = isset($request->owner_id) ? ',' . $request->owner_id . ',owner_id' : '';

        $this->validate($request, [
            'email' => 'required|email|unique:owners,email' . $email_rule . '|regex:/^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$/i',
        ]);
    }

}
