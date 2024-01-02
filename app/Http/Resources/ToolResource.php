<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToolResource extends JsonResource
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
            'id' => $this->productable->id,
            'product_id' => $this->id,
            'title' => $this->productable->title,
            'price' => $this->productable->price,
            'slug' => $this->productable->title,
            'image' => $this->productable->image,
            'description' => $this->productable->description,
            'link' => $this->productable->link,
            'benefits' => $this->productable->benefits,
        ];
    }
}
