<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $admins = User::get();
        if ($admins->isEmpty()) {
            return response()->json(['message' => 'No data found'], response::HTTP_NOT_FOUND);
        }
        return $admins;
    }

    public function store(CreateUserRequest $request){
        $data = $request->validated();
        User::create($data);
        return response()->json(['message' => 'User created successfully'], response::HTTP_CREATED);
    }

    public function update(UpdateUserRequest $request, $id){
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], response::HTTP_NOT_FOUND);
        }
        $user->update($request->validated());
        return response()->json(['message' => 'User updated successfully'], response::HTTP_OK);
    }
    public function destroy($id){
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], response::HTTP_NOT_FOUND);
        }
    $user->delete();
        return response()->json(['message' => 'User deleted successfully'], response::HTTP_OK);
    }
}
