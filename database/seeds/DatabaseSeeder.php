<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(SectionTableSeeder::class);
        // $this->call(SectionQuestionTableSeeder::class);

        $admin = Role::where('name','admin')->first();
        $permissions = Permission::get();

        foreach ($permissions as $key => $value) {
            $admin->attachPermission($value);
        }

        $user = User::where('email','admin@surveyapp.com')->first();
        $user->attachRole($admin);
    }
}
