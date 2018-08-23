<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VehicleController extends Controller
{
    public function index() {

        $vehicles = Vehicle::orderBy('id', 'DESC')->get();
        return VehicleResource::collection($vehicles);
    }

    public function show($uuid) {

        $vehicle = $uuid == "current" ? $user = Auth::user() : Vehicle::where('uuid', $uuid)->firstOrFail();

        return new VehicleResource($vehicle);
    }

    public function store(Request $request) {

        $data = $request->all();
       
        $this->validate($request, Vehicle::getDefaultRules());
       
        $vehicle = new Vehicle();
        $vehicle->fillByRequest($data);
        $vehicle->save();

        return new VehicleResource($vehicle);
    }

    public function update($uuid, Request $request) {

        $this->validate($request, Vehicle::getDefaultRules(true));
        
        try{
            $vehicle = Vehicle::where('uuid', $uuid)->firstOrFail();

        }catch(ModelNotFoundException $e) {

            throw new ModelNotFoundException();
        }

        $data = $request->all();
        $vehicle->save($data);

        return new VehicleResource($vehicle);
    }
}
