<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class InvoicingSettingUtility extends Model
{
    protected $table = 'invoicing_setting_utility';
    protected $guarded= [];

    protected $dates = ['billing_start_date','billing_end_date'];


    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function taxType()
    {
        return $this->belongsTo(TaxType::class, 'tax_type_id', 'id');
    }
}
