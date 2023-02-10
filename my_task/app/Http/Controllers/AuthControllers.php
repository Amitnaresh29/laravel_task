<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Socialite;

class AuthControllers extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Get the authenticated user
            $user = Auth::user();
            // Generate a token for the user
            $token = $user->createToken('AccessToken')->accessToken;
            // Return the user details and token
            return response()->json(['user' => $user, 'token' => $token]);
        }

        // Return an error if login fails
        return response()->json(['error' => 'Incorrect email or password'], 401);
    }

    public function googleLogin(Request $request)
    {
        // Get the Google user data
        $googleUser = Socialite::driver('google')->user();
        // Check if the user already exists in the database
        $user = User::where('email', $googleUser->email)->first();
        // If the user doesn't exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(str_random(16)),
            ]);
        }
        // Generate a token for the user
        $token = $user->createToken('AccessToken')->accessToken;
        // Return the user details and token
        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function facebookLogin(Request $request)
    {
        // Get the Facebook user data
        $facebookUser = Socialite::driver('facebook')->user();
        // Check if the user already exists in the database
        $user = User::where('email', $facebookUser->email)->first();
        // If the user doesn't exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'password' => bcrypt(str_random(16)),
            ]);
        }
        // Generate a token for the user
        $token = $user->createToken('AccessToken')->accessToken;
        // Return the user details and token
        return response()->json(['user' => $user, 'token' => $token]);
    }
}
