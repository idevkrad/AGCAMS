<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $information = json_decode($this->information);
        return [
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'religion' => $this->religion,
            'sex' => $this->sex,
            'civil' => $this->civil,
            'living' => $this->living,
            'ethnic' => $this->ethnic,
            'city' => $information->address->city,
            'province' => $information->address->province,
            'emergency' => $information->emergency,
        ];
    }
}
