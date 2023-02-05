<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'helped' => $this->helped,
            'reason' => $this->reason,
            'support' => $this->support,
            'choices' => json_decode($this->choices),
            'decided' => json_decode($this->decided),
            'preferences' => json_decode($this->preferences),
        ];
    }
}
