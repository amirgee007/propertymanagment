<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = 'system_settings';
    protected $guarded = [];


    public function scopeByUser($query, $user_id)
    {
        return $user_id ? $query->where('user_id', $user_id) : $query;
    }

    public function scopeHasTax($query)
    {
        return $query->where('tax', true);
    }
}
