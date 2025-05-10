<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameCategory extends Model
{
    protected $fillable = [
        'category_name',
        'category_code',
        'category_status',
        'category_image'
    ];

    public function game(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
