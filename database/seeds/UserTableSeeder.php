<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
            'username' => 'admin',
            'email' => 'admin@surveyapp.com',
            'password' => bcrypt('secret'),
          ],

          [
            'username' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('secret'),
          ]
        ]);
    }
}
