<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SinkingFund extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['date'];

    protected $appends = ['lot_type_name', 'lot_name'];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'lot_id');
    }

    public function getLotNameAttribute()
    {
        return $this->lot ? $this->lot->lot_name : null;
    }

    public function getLotTypeNameAttribute()
    {
        return $this->lot ? $this->lot->lot_type->lot_type_name : null;
    }
}
