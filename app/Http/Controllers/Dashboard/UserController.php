<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $users = User::select('users.*')->where('taken_survey', 0);
        $data['users'] = $users->groupBy('email')->get();
        // echo "<pre>"; print_r($data); die;
        return view('users.index',$data);
    }



    public function show($id = null)
    {
        $user = User::find($id);
        return view('users.form',['user' => $user]);
    }

    public function save(Request $request)
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
          'avatar' => [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ],
          'cover' => [
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]
        ];

        $this->validate($request, $rules[$request->form_type]);

        $user = User::firstOrNew(['id' => $request->id]);

        if ($request->form_type == "basic_info") {
          $user->updateBasicInfo($request);
        }

        if ($request->form_type == "password") {
          $updatePassword = $user->where('id', Auth::user()->id)->first();
          $user->updatePassword($request);
        }

        if ($request->form_type == "avatar") {
          $user->updateAvatar($request);
        }

        if ($request->form_type == "cover") {
          $user->updateCover($request);
        }

        return redirect('/dashboard/users/'.$user->id.'/edit');
    }

    public function imageUpload($id, $type)
    {
        $data['type'] = $type;
        $data['user'] = User::find($id);
        return view('users.form.image',$data);
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/dashboard/users');
    }

    public function loginAs($userId)
    {
        $user = Auth::user();

        session()->forget('adminId');

        if ($user->id != $userId) {
          if ($user->hasRole('super-admin')) {
            session(['adminId' => Auth::user()->id]);
          }
        }

        Auth::loginUsingId($userId, true);
        Auth::user()->update(['last_activity' => Carbon::now()]);

        return redirect('/');
    }

}
