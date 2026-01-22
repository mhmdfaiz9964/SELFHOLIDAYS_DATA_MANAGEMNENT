<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $fillable = [
        'cheque_number',
        'cheque_date',
        'bank_id',
        'amount',
        'payer_name',
        'reason_id',
        'status',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }

    public function payments()
    {
        return $this->hasMany(ChequePayment::class);
    }

    public function getPaidAmountAttribute()
    {
        return $this->payments()->sum('amount');
    }

    public function getBalanceAmountAttribute()
    {
        return $this->amount - $this->paid_amount;
    }
}
