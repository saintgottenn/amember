<?php

namespace App\Http\Resources;

use App\Models\Tool;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $toolIds = json_decode($this->productable->tools_included, true);
        $tools = Tool::findMany($toolIds);
        
        return [
            'id' => $this->productable->id,
            'product_id' => $this->id,
            'title' => $this->productable->title,
            'price' => $this->productable->price,
            'description' => $this->productable->description,
            'tools_included' => $tools,
        ];
    }
}
