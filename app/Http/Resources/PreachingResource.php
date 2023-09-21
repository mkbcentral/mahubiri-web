<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreachingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=>$this->title,
            'preacher_name'=>$this->preacher_name,
            'preaching_url'=>$this->preaching_url,
            'church'=>new ChurchResource($this->church),
        ];
    }
}
