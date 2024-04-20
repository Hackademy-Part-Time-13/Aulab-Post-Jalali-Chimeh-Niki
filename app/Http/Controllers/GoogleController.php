<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $userGoogle=Socialite::driver('google')->user();

        $findUser=User::where('google_id', $userGoogle->id)->first();
        if($findUser){
            Auth::login($findUser);

            return redirect()->route('homepage');
        } else {
            $findEmail=User::where('email', $userGoogle->email)->first();
            if($findEmail){
                $findEmail->google_id=$userGoogle->id;
                $findEmail->save();
                Auth::login($findEmail);

                return redirect()->route('homepage');
            } else {
                $newUser = User::create([
                    'name' => $userGoogle->name,
                    'email' => $userGoogle->email,
                    'password' => encrypt(''),
                    'google_id' => $userGoogle->id,
                ]);
        
                Auth::login($newUser);
        
                return redirect()->route('homepage');
            }
        }
    }
}
