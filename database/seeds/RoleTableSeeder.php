<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'User Admin can create, update, delete, view users and roles',
            ],
            [
                'name' => 'user',
                'display_name' => 'Site User',
                'description' => 'No Special Prmissions',
            ],
        ]);
    }
}
