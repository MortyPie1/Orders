<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\LoginDriverRequest;
use App\Http\Requests\Driver\CreateDriverRequest;
use App\Models\Driver;
use Symfony\Component\HttpFoundation\Response;

class DriverAuthController extends \Illuminate\Routing\Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['login', 'register']]);
    }
    public function register(CreateDriverRequest $request){
        $driver = $request->validated();
        Driver::create($driver);
        return response()->json(['message' => 'Driver created successfully.'], response::HTTP_CREATED);
    }

    public function login(LoginDriverRequest $request){
        $driver = $request->validated();
        $token = auth()->attempt($driver);
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
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
