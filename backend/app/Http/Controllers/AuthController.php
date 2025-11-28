<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function register(Request $r){
        $data = $r->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6'
        ]);
        $user = User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password'])]);
        return response()->json($user,201);
    }
    public function login(Request $r){
        $credentials = $r->validate(['email'=>'required|email','password'=>'required']);
        if(!auth()->attempt($credentials)){
            return response()->json(['message'=>'Invalid credentials'],401);
        }
        $token = auth()->user()->createToken('api-token')->plainTextToken;
        return response()->json(['token'=>$token]);
    }
    public function logout(Request $r){
        $r->user()->currentAccessToken()->delete();
        return response()->json(['message'=>'logged out']);
    }
}