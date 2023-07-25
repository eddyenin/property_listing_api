<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyResource;
use App\Models\Broker;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PropertyResource::collection(Property::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {

        $request->validated();

        $property = Property::create([
            'broker_id'=>$request->broker_id,
            'address'=>$request->address,
            'listing_type'=>$request->listing_type,
            'city'=>$request->city,
            'zip_code'=>$request->zip_code,
            'description'=>$request->description,
            'build_year'=>$request->build_year
        ]);

        $property->characteristic()->create([
            'property_id'=>$property->id,
            'bedrooms'=>$request->bedrooms,
            'bathrooms'=>$request->bathrooms,
            'sqft'=>$request->sqft,
            'price_sqft'=>$request->price_sqft,
            'price'=>$request->price,
            'property_type'=>$request->property_type,
            'status'=>$request->status
        ]);

        return new PropertyResource($property);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        return new PropertyResource($property);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {

        $property->update($request->only(['broker_id','address','city','zip_code','description','listing_type','build_year']));
        $property->characteristic->where('property_id',$property->id)->update($request->only([
            'property_id','price','bedrooms','bathrooms','property_type','status','sqft','price_sqft'
        ]));

        return new PropertyResource($property);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json(['status'=>true,'message'=>'Property deleted successfully'],200);
    }
}
