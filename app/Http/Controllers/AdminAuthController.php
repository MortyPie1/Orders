<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\LoginAdminRequest;
use App\Models\Admin;
use Symfony\Component\HttpFoundation\Response;




class AdminAuthController extends \Illuminate\Routing\Controller
{
    public function __construct(){
        $this->middleware('auth:admin', ['except' => ['login','register']]);
    }
    public function register(CreateAdminRequest $request){
        $admin = $request->validated();
        Admin::create($admin);
        return response()->json(['message' => 'Admin created successfully'],response::HTTP_CREATED);
    }


    public function login(LoginAdminRequest $request){
        $admin = $request->validated();
        $token = auth('admin')->attempt($admin);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], response::HTTP_UNAUTHORIZED);
        }
        return $this->createNewToken($token);
    }



    public function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires'=>auth()->factory()->getTTL()*360,
            'user' => auth()->user()]);
    }
    public function logout(){
        auth('admin')->logout();
        return response()->json(['message' => 'You successfully signed out']);
    }
}
