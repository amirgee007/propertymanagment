<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoicingSettingMaintenanceService extends Model
{
    protected $table = 'invoicing_setting_maintenance_service';
    protected $guarded = [];
    protected $dates = ['billing_end_date'];

    const PROPERTY_SIZE = 'property_size';
    const TOTAL_AMOUNT = 'total_amount';

    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
}
