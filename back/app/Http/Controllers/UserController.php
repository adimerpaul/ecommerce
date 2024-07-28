<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    function login(Request $request){
        $user = User::where('username', $request->username)->first();
        if($user && Hash::check($request->password, $user->password)){
            return response()->json([
                'token' => $user->createToken('token')->plainTextToken,
                'user' => $user
            ]);
        }
        return response()->json([
            'message' => 'Usuario o contraseña incorrectos'
        ], 401);
    }
    function me(Request $request){
        return $request->user();
    }
    function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Sesión cerrada'
        ]);
    }
    function index(){
        return User::all();
    }
}
