<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScholasticResource extends JsonResource
{
    public function toArray($request)
    {
        $schools = json_decode($this->schools);

        return [
            // 'schools' => $this->scholastic->schools,
            'gradeschool' => $schools->gradeschool,
            'highschool' => $schools->highschool,
            'college' => $schools->college,
            'awards' => json_decode($this->awards),
        ];
    }
}
