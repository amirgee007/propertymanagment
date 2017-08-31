<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicingSettingGeneral extends Model
{
    protected $table = 'invoicing_setting_general';
    protected $guarded= [];

    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
