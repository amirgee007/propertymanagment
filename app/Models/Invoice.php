<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Invoice extends Model
{
    use SoftDeletes, Notifiable;

    protected $table = 'invoices';

    protected $primaryKey = 'invoice_id';

    protected $guarded = [];

    protected $dates = ['date'];

    protected $appends = ['label_status', 'due_date'];

    const PAID = 'paid';
    const UNPAID = 'unpaid';
    const PARTIAL = 'partial';
    const OVERDUE = 'overdue';


    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'owner_id');
    }

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'lot_id');
    }


    public function getLabelStatusAttribute()
    {
        if ($this->invoice_status == Invoice::PAID)
            return '<span class="label label-success">Paid</span>';
        else if ($this->invoice_status == Invoice::UNPAID)
            return '<span class="label label-primary">Unpaid</span>';
        else if ($this->invoice_status == Invoice::PARTIAL)
            return '<span class="label label-warning">Partial</span>';
        else if ($this->invoice_status == Invoice::OVERDUE)
            return '<span class="label label-danger">Overdue</span>';
        else
            return '<span class="label">Nill</span>';
    }

    public function getDueDateAttribute()
    {
        return config('invoice_due_date')->format('d-m-Y');
    }

    public function payments()
    {
        return $this->hasMany(InvoicePayment::class, 'invoice_id', 'invoice_id');
    }

    public function routeNotificationForMail()
    {
        return request()->from_email;
    }
}
