<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerLot extends Model
{
    protected $table = 'owner_lots';
    protected $guarded = [];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'lot_id');
    }

    public function lotTypes()
    {
        return $this->hasMany(LotType::class, 'lot_type_id', 'lot_type_id');
    }


}
