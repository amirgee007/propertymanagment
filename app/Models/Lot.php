<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lots';
    protected $guarded = [];
    protected $primaryKey ='lot_id';


    public function lot_type()
    {
        return $this->belongsTo(LotType::class, 'lot_type_id', 'lot_type_id');
    }
}
