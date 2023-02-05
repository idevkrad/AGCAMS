<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray($request)
    {
       return [
            'is_international' => $this->is_international,
            'course' => $this->course,
            'college' => $this->course->college,
            'year' => $this->year,
            'status' => $this->status,
       ];
    }
}
