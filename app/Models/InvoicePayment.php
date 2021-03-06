<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InvoicePayment extends Model
{
    use SoftDeletes, Notifiable;

    protected $primaryKey = 'invoice_payment_id';

    protected $table = 'invoice_payments';

    protected $guarded = [];

    protected $dates = ['payment_date'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'invoice_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_id');
    }

    public function routeNotificationForMail()
    {
        return request()->email_to;
    }
}
