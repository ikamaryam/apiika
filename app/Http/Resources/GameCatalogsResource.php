<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameCatalogsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            'category_code' => $this->category_code,
            'category_status' => $this->category_status,
            'category_image' => $this->category_image,
        ];
    }
}
