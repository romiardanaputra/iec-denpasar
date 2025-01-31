<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('gauth_id', $user->id)->first();
            // dd($user);

            if ($finduser) {
                auth()->login($finduser);

                return redirect('/dashboard');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => bcrypt('password'),
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',
                    'gauth_token' => $user->token,
                    'gauth_avatar' => $user->avatar,
                ]);

                $newUser->assignRole(Role::find(2));
                $newUser->sendEmailVerificationNotification();

                auth()->login($newUser);

                return redirect('/dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
