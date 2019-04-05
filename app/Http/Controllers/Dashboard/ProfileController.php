<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data['user']    = User::where( 'id', $user->id )->first();
        $data['profile'] = UserProfile::where('user_id',$user->id )->first();

        return view('profile.form',$data);
    }

    public function update(Request $request)
    {

        $return = '/dashboard/profile';

        $rules = [
          'basic_info' => [
            'name'=>'required',
            'email'=>'required'
          ],
          'password' => [
            'old_password'          => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required'
          ],
          'cover' => [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
          ]
        ];

        $this->validate($request, $rules[$request->form_type]);

        $user = Auth::user();

        if ($request->form_type == "basic_info") {
          $user->updateBasicInfo($request);
        }

        if ($request->form_type == "password") {
          $updatePassword = $user->where('id', Auth::user()->id)->first();

          if (!password_verify($request->old_password , $updatePassword->password)) {
            return back()->with('password-fail', 'Old Password provided is invalid.');
          }

          $user->updatePassword($request);
        }

        if ($request->form_type == "cover") {
          $user->updateCover($request);
        }

        return redirect($return)->with('success',"Profile updated successfully");
    }


    public function imageUpload($type)
    {
        $data['type'] = $type;
        return view('profile.form.image',$data);
    }

    public function remove($type,$id)
    {
        $userProfile = Auth::user()->profile;

        if(!$userProfile) {
          return back();
        }

        $userProfile->update([$type => '']);
        return back();
    }
}
