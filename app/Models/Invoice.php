<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'invoice_id',
        'invoice_owner_name',
        'invoice_lot_no',
        'invoice_date',
        'invoice_trans_des',
        'invoice_quantity',
        'invoice_uom',
        'invoice_charge_rate',
        'invoice_amount'
    ];
}
