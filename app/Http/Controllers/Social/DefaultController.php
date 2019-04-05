<?php

namespace App\Http\Controllers\Social;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Model\UserProfile;
use App\User;

class DefaultController extends Controller
{
    public function redirectToProvider($driver)
    {
      return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
      try {
        $user = Socialite::driver($driver)->user();
      } catch (\Exception $e) {
        return redirect('/login');
      }

      $existingUser = User::where('email', $user->email)->first();

      if($existingUser){
        auth()->login($existingUser, true);

      } else {

        $newUser            = new User;
        $userProfile        = new UserProfile;

        $newUser->name      = $user->name;
        $newUser->email     = $user->email;
        $newUser->password  = '';

        $newUser->save();

        $userProfile->user_id = $newUser->id;
        $userProfile->avatar  = $user->avatar;
        $userProfile->save();

        auth()->login($newUser, true);
      }

      return redirect()->to('/take-survey');
    }
}
