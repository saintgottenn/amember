<?php

namespace App\Http\Resources;

use App\Models\Currency;
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
        $price = $this->productable->price;
        $currencySymbol = '$';

        if(!isset(session('user_currency')->is_default)) {
            $multiPrice = $this->productable->prices->firstWhere('country_code', session('user_currency')->currency);
            
            if($multiPrice && $multiPrice->price) {
                $price = $multiPrice->price;
                $currencySymbol = Currency::where('currency', session('user_currency')->currency)->first()->symbol;    
            }
        }

        return [
            'id' => $this->productable->id,
            'product_id' => $this->id,
            'title' => $this->productable->title,
            'price' => $price,
            'currency_symbol' => $currencySymbol,
            'slug' => $this->productable->title,
            'image' => $this->productable->image,
            'description' => $this->productable->description,
            'link' => $this->productable->link,
            'benefits' => $this->productable->benefits,
        ];
    }
}
