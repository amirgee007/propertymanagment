<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $table = 'owners';
    protected $primaryKey = 'owner_id';

    protected $fillable = [
        'owner_id',
        'user_id',
        'owner_type',
        'owner_id_card_no',
        'owner_name',
        'owner_dob',
        'owner_gender',
        'owner_address',
        'owner_phone1',
        'owner_phone2',
        'email'
    ];

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
        if ($this->is_company === 1) {
            return '<span class="label label-info">True</span>';
        }

        return '<span class="label label-danger">False</span>';
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
}
