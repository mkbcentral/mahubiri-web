<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChurchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'abreviation'=>$this->abreviation,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'logo_url'=>$this->logo_url,
        ];
    }
}
