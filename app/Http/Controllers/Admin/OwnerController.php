<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Lot;
use App\Models\LotType;
use App\Models\Meter;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Owner')) {
            $owners = Owner::where('user_id', $user->id)->paginate(10);
        } else {
            $owners = Owner::paginate(10);
        }

        return view('admin.owner-management.index', compact('owners'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewProfile()
    {
        return view('admin.owner-management.add');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function cardCheck(Request $request)
    {
        $data = Owner::where($request->key, $request->value)->first();
        if ($data) {
            return 'match';
        } else {
            return 'no_match';
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $owner = Owner::find($id);

        if (is_null($owner)) {

            flash('First Add owners Info')->warning();
            redirect()->route('owner.add.new');
        }

        $company = $owner->company;

        //$ob = (Owner::first()->owner_dob);
        //dd(Carbon::parse($ob)->diffInYears(Carbon::now()));

        return view('admin.owner-management.show', compact('company', 'owner'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->formValidation($request);

        $ownerId = null;
        $savableOwner = new Owner();
        $savableOwner = $this->saveOwnerData($request, $savableOwner);
        $ownerId = $savableOwner->owner_id;

        if (isset($request->is_company)) {

            $savableCompany = new Company();
            $this->saveCompanyData($request, $savableCompany, $ownerId);
        }

        flash('Successfully Created the Owner')->success();
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function edit($id)
    {
        $owner = Owner::find($id);

        if (is_null($owner)) {
            flash('First Add owners Info')->warning();
            return redirect('/dashboard/owner/add');
        }

        $company = $owner->company;

        $lots = Lot::all();
        $lotType = LotType::all();
        $ownerLots = $owner->ownedLots->pluck('lot_id')->toArray();
        $meters = Meter::whereIn('lot_id', $ownerLots)->get();

        return view('admin.owner-management.edit', compact('lotType', 'lots', 'company', 'owner', 'meters'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        if ($user->hasRole('Owner')) {
            flash("You don't have access to this feature.")->error();
            return back();
        }

        $this->formValidation($request);

        $ownerId = null;
        $savableOwner = Owner::where('owner_id', $request->owner_id)->first();
        $this->saveOwnerData($request, $savableOwner);

        flash('Successfully Updated the Owner')->success();
        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
        $user = auth()->user();

        if ($user->hasRole('Owner')) {
            flash("You don't have access to this feature.")->error();
            return back();
        }

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

    /**
     * @param Request $request
     * @param $savableCompany
     * @param $ownerId
     */
    private function saveCompanyData(Request $request, $savableCompany, $ownerId)
    {
        $savableCompany->comp_name = isset($request->comp_name) ? $request->comp_name : '';
        $savableCompany->owner_id = !is_null($ownerId) ? $ownerId : 0;
        $savableCompany->comp_address = isset($request->comp_address) ? $request->comp_address : '';
        $savableCompany->comp_reg_no = isset($request->comp_reg_no) ? $request->comp_reg_no : '';
        $savableCompany->comp_telephone_no = isset($request->comp_telephone_no) ? $request->comp_telephone_no : '';
        $savableCompany->comp_fax_no = isset($request->comp_fax_no) ? $request->comp_fax_no : '';
        $savableCompany->comp_contact_person = isset($request->comp_contact_person) ? $request->comp_contact_person : '';
        $savableCompany->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
        $savableCompany->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
        $savableCompany->save();
    }

    /**
     * @param Request $request
     * @param $savableOwner
     * @return mixed
     */
    private function saveOwnerData(Request $request, $savableOwner)
    {
        $savableOwner->owner_type = isset($request->owner_type) ? $request->owner_type : '';
        $savableOwner->owner_id_card_no = isset($request->owner_id_card_no) ? $request->owner_id_card_no : '';
        $savableOwner->owner_name = isset($request->owner_name) ? $request->owner_name : '';
        $savableOwner->email = isset($request->email) ? $request->email : null;
        $savableOwner->owner_dob = isset($request->owner_dob) ? $request->owner_dob : '';
        $savableOwner->owner_gender = isset($request->owner_gender) ? $request->owner_gender : '';
        $savableOwner->owner_address = isset($request->owner_address) ? $request->owner_address : '';
        $savableOwner->owner_phone1 = isset($request->owner_phone1) ? $request->owner_phone1 : '';
        $savableOwner->owner_phone2 = isset($request->owner_phone2) ? $request->owner_phone2 : '';
        $savableOwner->is_company = isset($request->is_company) ? 1 : 0;
        $savableOwner->user_id = (Auth::user()) ? Auth::user()->id : '0';
        $savableOwner->save();

        return $savableOwner;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOwnerCompany(Request $request)
    {
        if ($request->has('owner_id') && $request->has('company_id')) {
            $company = Company::where('comp_id', $request->company_id)->firstOrFail();
            try {
                $company->update($request->except('_token', 'owner_id', 'company_id'));

                flash('Successfully updated the Company Info')->success();
                return back();

            } catch (\Exception $e) {
                dd($e);
            }
        }

        flash('Sorry! No owner company found.')->error();
        return back();
    }
}
