<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(["message" => "User not found"], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user = User::find($id);
        $user->update($data);
        return response()->json(["message" => "Update Success!", "user" => $user], 200);
    }
}
