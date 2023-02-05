<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'method' => $this->method,
            'purpose' => $this->purpose,
            'status' => $this->status,
            'counselor' => new NameResource($this->counselor),
            'student' => new NameResource($this->student),
            'course' => $this->student->student->course->name,
            'year' => $this->student->student->year->others,
            'note' => $this->note,
            'created_at' => $this->created_at,
        ];
    }
}
