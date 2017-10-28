<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Company extends Model
{
    protected $table = 'companies';

    protected $primaryKey = 'comp_id';

    protected $fillable = [
        'comp_id',
        'owner_id',
        'comp_name',
        'comp_address',
        'comp_reg_no',
        'comp_telephone_no',
        'comp_fax_no',
        'comp_contact_person',
        'comp_contact_no',
        'owner_phone1',
        'owner_phone2'
    ];

    /**
     * @param Request $request
     * @param $company
     * @param $ownerId
     * @return mixed
     */
    public static function saveCompanyData(Request $request, $company, $ownerId)
    {
        $company->comp_name = isset($request->comp_name) ? $request->comp_name : '';
        $company->owner_id = !is_null($ownerId) ? $ownerId : 0;
        $company->comp_address = isset($request->comp_address) ? $request->comp_address : '';
        $company->comp_reg_no = isset($request->comp_reg_no) ? $request->comp_reg_no : '';
        $company->comp_telephone_no = isset($request->comp_telephone_no) ? $request->comp_telephone_no : '';
        $company->comp_fax_no = isset($request->comp_fax_no) ? $request->comp_fax_no : '';
        $company->comp_contact_person = isset($request->comp_contact_person) ? $request->comp_contact_person : '';
        $company->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
        $company->comp_contact_no = isset($request->comp_contact_no) ? $request->comp_contact_no : '';
        $company->save();

        return $company;
    }

    //    public function owner() {
//        return $this->belongsTo(Owner::class, 'owner_id', 'comp_id');
//    }

}
