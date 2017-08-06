<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LotType extends Model
{
    protected $table = 'lot_types';
    protected $guarded = [];
    protected $primaryKey = 'lot_type_id';

    public function lots()
    {
        return $this->hasMany(Lot::class, 'lot_type_id', 'lot_type_id');
    }
}
