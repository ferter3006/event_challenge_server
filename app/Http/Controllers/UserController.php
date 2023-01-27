<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function setup(){
        //Artisan::call("php artisan ferter");
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }
    public function createUser(Request $request)
    {
        // Validate data from request
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
            'province' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        // Create this new User
        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'province' => $validated['province'],
            'city' => $validated['city'],
            'country' => $validated['country']
        ]);

        return [
            'status' => 1,
            'message' => 'user correctly created'
        ];
    }

    public function loginUser(Request $request)
    {
        // Attemp to Login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return [
                'status' => 0,
                'message' => 'Invalid email or/and password'
            ];
        }

        // Get info from User and create Token
        $thisUser = $request->user();
        $token = $thisUser->createToken('token')->plainTextToken;

        return [
            'status' => 1,
            'token' => $token,
            'user' => $thisUser->only('id', 'name', 'email'),
        ];
    }

    public function indexUsers()
    {
        $users = User::with('events')->get();

        return [
            'status' => 1,
            'users' => $users
        ];
    }
}
