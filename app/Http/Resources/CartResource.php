<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'product_id' => $this->product_id,
            'user_id' => $this->user_id,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at,
            'product' => [
                'id' => $this->product->productable->id,
                'image' => $this->product->productable->image ?? null,
                'title' => $this->product->productable->title,
                'price' => $this->product->productable->price, 
            ],
        ];
    }
}
