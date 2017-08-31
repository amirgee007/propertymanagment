<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class InvoicingSettingUtility extends Model
{
    protected $table = 'invoicing_setting_utility';
    protected $guarded= [];
    protected $appends = ['billing_start_date'];
    public function getBillingStartDateAttribute( $value ) {
      return  $this->attributes['billing_start_date'] =  \Carbon\Carbon::createFromFormat('Y-m-d', $value)->format('m/d/Y');;
    }
}
