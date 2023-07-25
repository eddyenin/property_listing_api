<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacteristicsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'property_id'=>$this->property_id,
            'price'=>$this->price,
            'bedrooms'=>$this->bedrooms,
            'bathrooms'=>$this->bathrooms,
            'property_type'=>$this->property_type,
            'status'=>$this->status,
            'sqft'=>$this->sqft,
            'price_sqft'=>$this->price_sqft

        ];
    }
}
