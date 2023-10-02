<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoritePreachingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'p_id'=>$this->preaching?->id,
            'title'=>$this->preaching?->title,
            'preacher_name'=>$this->preaching?->preacher_name,
            'preaching_url'=>$this->preaching?->preaching_url,
            'church'=>new ChurchResource($this->preaching?->church),
        ];
    }
}
