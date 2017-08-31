<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lots';
    protected $guarded = [];
    protected $primaryKey ='lot_id';

    public function owner() {
        return $this->belongsToMany(Owner::class , 'owner_lots' , 'lot_type_id' , 'lot_id');
    }

}
