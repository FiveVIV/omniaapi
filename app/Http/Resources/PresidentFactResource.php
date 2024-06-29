<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PresidentFactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'president_id' => $this->president_id,
            'fact' => $this->fact,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
