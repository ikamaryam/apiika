<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = [
        'game_category_id',
        'game_name',
        'game_code',
        'game_status',
        'game_image'
    ];

    public function gameCategory(): BelongsTo
    {
        return $this->belongsTo(GameCategory::class);
    }
}
