<?php

namespace App\Http\Resources;

use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $broker = Broker::find($this->broker_id);
        return [
            'id'=>(string) $this->id,
            'attributes'=>[
                'address'=>$this->address,
                'city'=>$this->city,
                'zip_code'=>$this->zip_code,
                'description'=>$this->description,
                'listing_type'=>$this->listing_type,
                'build_year'=>$this->build_year
            ],
            'characteristics'=>[
                new CharacteristicsResource($this->characteristic)
            ],
            'broker'=>[
                'name'=>$broker->name,
                'address'=>$broker->address,
                'phone_number'=>$broker->phone_number
            ]

        ];
    }
}
