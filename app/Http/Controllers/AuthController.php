<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $data = $request->all();
        $user = User::where("email", $data['email'])->first();
        if (!$user) {
            return response()->json(["message" => "Email incorrect!"], 401);
        }

        if(!password_verify($data['password'], $user['password'])) {
            return response()->json(["message" => "Password incorrect!"], 401);
        };

        return response()->json(["message" => "Login successful!", "user" => new UserResource($user)], 200);
    }

    public function register(Request $request) {
        $user = User::create($request->all());
        $user = array_merge($user->toArray(), ["password" => Hash::make($user["password"])]);
        return response()->json(["message" => "Register Success!", "user" => $user], 201);
    }
}
