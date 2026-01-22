<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $fillable = ['name'];

    public function cheques()
    {
        return $this->hasMany(Cheque::class);
    }
}
