<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

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

//    public function owner() {
//        return $this->belongsTo(Owner::class, 'owner_id', 'comp_id');
//    }
}
