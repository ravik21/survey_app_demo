<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserProfile;
use App\Models\SectionQuestionAnswer;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Hash, Auth;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password', 'last_activity', 'taken_survey'
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id', 'id');
    }

    public function updateBasicInfo($request)
    {
        $this->name        = $request->name;
        $this->email       = $request->email;

        if($request->username) {
          $this->username    = $request->username;
        }

        $this->save();
    }

    public function updatepassword($request)
    {
        $this->password = Hash::make($request->password);
        $this->save();
    }

    public function updateCover($request)
    {
        $image = $request->file('cover');
        if($path = $image->storeAs('covers/'.str_random(6), $image->getClientOriginalName())){
          $userProfile = $this->profile ? $this->profile :  UserProfile::firstOrNew(['user_id' => $this->id]);
          $userProfile->cover = 'storage/'. $path;
          $userProfile->save();
        }
    }

    public function answers()
    {
        return $this->hasOne(SectionQuestionAnswer::class, 'user_id', 'id');
    }

}
