<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class InvoicingSettingGeneral extends Model
{
    protected $table = 'invoicing_setting_general';
    protected $guarded = [];

    protected $appends = ['due_date'];

    public function scopeByUser($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }

    public function getDueDateAttribute()
    {
        return $this->invoice_due_date ? Carbon::parse($this->invoice_due_date) : null;
    }
}
