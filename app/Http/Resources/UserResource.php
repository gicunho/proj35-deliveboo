<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant_name' => $this->restaurant_name,
            'restaurant_image' => $this->restaurant_image,
            'email' => $this->email,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'categories' => $this->categories,
        ];
    }
}