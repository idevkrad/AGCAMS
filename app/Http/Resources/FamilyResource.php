<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FamilyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'parent' => $this->parent,
            'structure' => $this->structure,
            'father' => json_decode($this->father),
            'mother' => json_decode($this->mother),
            'spouse' => json_decode($this->spouse),
            'siblings' => json_decode($this->siblings),
            'childrens' => json_decode($this->childrens),
        ];
    }
}
