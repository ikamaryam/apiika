<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $fillable = [
        'id', 'customer_id', 'balance_id', 'amount'
    ];
}
