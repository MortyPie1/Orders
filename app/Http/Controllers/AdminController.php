<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Driver;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\Admin\UpdateAdminRequest;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    public function index(){
        $admin= Admin::get();
        if($admin->isEmpty()){
            return response()->json(['message'=>'No data found'],Response::HTTP_NOT_FOUND);
        }
        return response()->json($admin,Response::HTTP_OK);
    }

    public function update(UpdateAdminRequest $request ,$id){
        $admin =Admin::where('id',$id)->first();
        if(!$admin){
            return response()->json(['message'=>'No data found'],Response::HTTP_NOT_FOUND);
        }
        $admin->update($request->validated());
        return response()->json(['message'=>'Data updated successfully',$admin],Response::HTTP_OK);
    }
}
