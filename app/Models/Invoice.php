<?php

namespace App\Models;

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

    protected $appends = [
        'label_status', 'due_date', 'lot_type_name', 'lot_name',
        'paid_amount'
    ];

    // Statuses
    const PAID = 'paid';
    const UNPAID = 'unpaid';
    const PARTIAL = 'partial';
    const OVERDUE = 'overdue';

    // Types
    const UTILITY = 'utility';
    const SINKING = 'sinking';
    const MAINTENANCE = 'maintenance';


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
        if (config('invoice_setting.invoice_due_date'))
            return config('invoice_setting.invoice_due_date')->format('d-m-Y');
        else
            return '';
    }

    public function payments()
    {
        return $this->hasMany(InvoicePayment::class, 'invoice_id', 'invoice_id');
    }

    public function meterReading()
    {
        return $this->hasOne(MeterReading::class, 'invoice_id', 'invoice_id');
    }

    public function routeNotificationForMail()
    {
        return request()->from_email;
    }

    public function getLotNameAttribute()
    {
        return $this->lot ? $this->lot->lot_name : null;
    }

    public function getLotTypeNameAttribute()
    {
        return $this->lot ? $this->lot->lot_type->lot_type_name : null;
    }

    public function getPaidAmountAttribute()
    {
        return $this->payments()->sum('amount');
    }

    public static function generateFromSinkingFund($fund)
    {
        return self::create([
            'owner_id' => $fund->lot->ownerWithLot->lot_owner_id,
            'lot_id' => $fund->lot->lot_id,
            'date' => $fund->date,
            'invoice_trans_des' => $fund->description,
            'invoice_quantity' => 1, // ToDo: setting default to 1, change this accordingly
            'invoice_uom' => ' ',
            'invoice_charge_rate' => 0,
            'invoice_amount' => $fund->amount,
            'invoice_status' => Invoice::UNPAID,
            'type' => Invoice::SINKING,
        ]);
    }
}
