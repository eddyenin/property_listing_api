<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrokerRequest;
use App\Http\Resources\BrokersResource;
use App\Models\Broker;
use Illuminate\Http\Request;

class BrokerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BrokersResource::collection(Broker::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokerRequest $request)
    {
        $request->validated($request->all());

        $broker = Broker::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'city'=>$request->city,
            'zip_code'=>$request->zip_code,
            'phone_number'=>$request->phone_number,
            'image_path'=>$request->image_path
        ]);

        return response()->json(['status'=>true,'message'=>'Registered successfully','broker'=>$broker],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
