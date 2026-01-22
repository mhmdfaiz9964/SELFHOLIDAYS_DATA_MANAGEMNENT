<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChequePayment extends Model
{
    protected $fillable = ['cheque_id', 'payment_date', 'amount', 'note'];

    public function cheque()
    {
        return $this->belongsTo(Cheque::class);
    }
}
