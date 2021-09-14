<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'total_price' => $this->total_price,
            'address' => $this->address,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone_number' => $this->phone_number,
            'day' => $this->created_at->format('d'),
            'month_number' => $this->created_at->format('m'),
            'month' => $this->created_at->format('M'),
            'year' => $this->created_at->format('Y'),
            'dishes' => $this->dishes,
        ];
    }
}