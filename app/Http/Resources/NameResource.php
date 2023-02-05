<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NameResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->profile->firstname.' '.$this->profile->middlename.' '.$this->profile->lastname,
            'avatar' => $this->avatar
        ];
    }
}
