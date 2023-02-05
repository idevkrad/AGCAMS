<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'is_active' => $this->is_active,
            'profile' => new ProfileResource($this->profile),
            'student' => new StudentResource($this->student),
            'info' => new InfoResource($this->info),
            'scholastic' => new ScholasticResource($this->scholastic),
            'health' => new HealthResource($this->health),
            'family' => new FamilyResource($this->family),
            'education' => new EducationResource($this->education),
            'languages' => LanguageResource::collection($this->languages),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
