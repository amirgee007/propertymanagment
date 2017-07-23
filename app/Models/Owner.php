<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $table = 'owners';

    protected $fillable = [
        'owner_id',
        'owner_type',
        'owner_id_card_no',
        'owner_name',
        'owner_dob',
        'owner_gender',
        'owner_address',
        'owner_phone1',
        'owner_phone2'
    ];

    public function companies()
    {
        return $this->hasMany(Company::class, 'owner_id' , 'owner_id');
    }


}
