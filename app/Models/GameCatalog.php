<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameCatalog extends Model
{
    protected $fillable = [
        'name', 'detail'
    ];
}
