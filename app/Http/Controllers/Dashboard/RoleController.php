<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\User;
use Auth;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorized();
        return view('role.index');
    }

    public function form($id = null)
    {
        $this->authorized();
        $role = Role::find($id);
        return view('role.form',['role' => $role]);
    }

    public function store(Request $request)
    {
        $this->authorized();
        $role = Role::firstOrNew(['id' => $request->id]);

        $rules = [
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ];

        $request->validate($rules);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        return redirect('/dashboard/roles');
    }

    public function delete($id)
    {
        $this->authorized();

        $user = Auth::user();
        $role = Role::where(['id' => $id])->delete();
        return back();
    }

    public function authorized()
    {
        $user = Auth::user();
        if(!$user->hasRole('super-admin')){
          return redirect('/dashboard/users');
        }
    }
}
