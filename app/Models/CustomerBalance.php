<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBalance extends Model
{
    protected $fillable = [
        'id', 'customer_id', 'balance'
    ];
}
