<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HealthResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'height' => $this->height,
            'weight' => $this->weight,
            'disabilities' => $this->disabilities,
            'doyous' => json_decode($this->doyous),
            'haveyous' => json_decode($this->haveyous),
        ];
    }
}
