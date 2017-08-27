<?php

namespace App\Models;

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
        'owner_phone2'
    ];

    public function ownedLots()
    {
        return $this->hasMany(OwnerLot::class, 'lot_owner_id', 'owner_id');
    }


}
