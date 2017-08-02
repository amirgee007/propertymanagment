<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Owner;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{

    public function viewProfile()
    {
        return view('/admin/owner-management/add');
    }


    public function show()
    {

        $user_id = Auth::user()->id;
        $owner = Owner::where('owner_id', $user_id)->first();
        if (is_null($owner)) {

            flash('First Add owners Info')->warning();
            redirect()->route('owner.add.new');
        }

        $company = !is_null($owner) ? $owner->companies->first() : '';

        //$ob = (Owner::first()->owner_dob);
        //dd(Carbon::parse($ob)->diffInYears(Carbon::now()));

        return view('admin.owner-management.show', compact('company', 'owner'));

    }


    public function store(Request $request)
    {

        $ownerId = null;
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

    public function edit()
    {


        $user_id = Auth::user()->id;
        $owner = Owner::where('owner_id', $user_id)->first();
        if (is_null($owner)) {

            flash('First Add owners Info')->warning();
            redirect()->route('owner.add.new');
        }

        $company = !is_null($owner) ? $owner->companies->first() : '';

        //$ob = (Owner::first()->owner_dob);
        //dd(Carbon::parse($ob)->diffInYears(Carbon::now()));

        return view('admin.owner-management.edit', compact('company', 'owner'));

    }

    public function update(Request $request)
    {

        $ownerId = null;
        $savableOwner = Owner::where('owner_id', $request->owner_id)->first();
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
        $savableOwner->update();
        $ownerId = $savableOwner->id;


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

    public function assignLot(){
        return view('admin.owner-management.assignLot');
    }

    public function listOfAssignLot(){
        return view('admin.owner-management.listAssignLot');

    }

    public function settToOther(){
        return view('admin.owner-management.sellLot');

    }

}
