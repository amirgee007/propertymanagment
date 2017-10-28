<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Owner extends Model
{

    protected $table = 'owners';
    protected $primaryKey = 'owner_id';

    protected $guarded = [];

    protected $appends = ['status'];

    public function ownedLots()
    {
        return $this->hasMany(OwnerLot::class, 'lot_owner_id', 'owner_id');
    }

    public function ownerLots() {
        return $this->belongsToMany(Lot::class , 'owner_lots' , 'lot_owner_id' , 'lot_id');
    }


    public function getStatusAttribute()
    {
        if ($this->is_company == 1) {
            return '<span class="label label-info">True</span>';
        } else {
            return '<span class="label label-danger">False</span>';
        }
    }


    public function carParks()
    {
        return $this->hasMany(OwnerCarPark::class, 'owner_id', 'owner_id');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'owner_id', 'owner_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function saveOwnerData(Request $request, $owner)
    {
        $owner->owner_type = isset($request->owner_type) ? $request->owner_type : '';
        $owner->owner_id_card_no = isset($request->owner_id_card_no) ? $request->owner_id_card_no : '';
        $owner->owner_name = isset($request->owner_name) ? $request->owner_name : '';
        $owner->email = isset($request->email) ? $request->email : null;
        $owner->owner_dob = isset($request->owner_dob) ? $request->owner_dob : '';
        $owner->owner_gender = isset($request->owner_gender) ? $request->owner_gender : '';
        $owner->owner_address = isset($request->owner_address) ? $request->owner_address : '';
        $owner->owner_phone1 = isset($request->owner_phone1) ? $request->owner_phone1 : '';
        $owner->owner_phone2 = isset($request->owner_phone2) ? $request->owner_phone2 : '';
        $owner->is_company = isset($request->is_company) ? 1 : 0;
        if (is_null($owner->user))
            $owner->user_id = $request->user_id;
        $owner->save();

        return $owner;
    }
}
