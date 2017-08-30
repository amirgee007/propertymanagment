<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class InvoicingSettingUtility extends Model
{
    protected $table = 'invoicing_setting_utility';
    protected $guarded= [];
    protected $dates = ['billing_start_date'];
}
