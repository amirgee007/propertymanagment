<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    protected $fillable = ['name', 'status', 'rate'];

    protected $appends = ['label_status'];

    public function getLabelStatusAttribute()
    {
        if ($this->status == true)
            return '<span class="label label-success">Active</span>';
        else
            return '<span class="label label-danger">InActive</span>';
    }

    public function scopeIsActive($query)
    {
        $query->where('status', true);
    }
}
