<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GamesResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'game_category_id' => $this -> gameCategory,
            'game_name' => $this -> game_name,
            'game_code' => $this -> game_code,
            'game_status' => $this -> game_status,
            'game_image' => $this -> game_image,
        ];
    }
}
