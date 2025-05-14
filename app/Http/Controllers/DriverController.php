<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\Driver\UpdateDriverRequest;
use Symfony\Component\HttpFoundation\Response;



class DriverController extends Controller
{
    public function index(){
        $driver= Driver::get();
        if($driver->isEmpty()){
            return response()->json(['message'=>'No data found'],Response::HTTP_NOT_FOUND);
        }
        return response()->json($driver,Response::HTTP_OK);
    }

    public function update(UpdateDriverRequest $request ,$id){
        $driver =Driver::where('id',$id)->first();
        if(!$driver){
            return response()->json(['message'=>'No data found'],Response::HTTP_NOT_FOUND);
        }
        $driver->update($request->validated());
        return response()->json(['message'=>'Data updated successfully',$driver],Response::HTTP_OK);
    }
}
