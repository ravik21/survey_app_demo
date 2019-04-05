<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id', 'company', 'designation', 'education', 'status', 'avatar', 'cover'
    ];
}
