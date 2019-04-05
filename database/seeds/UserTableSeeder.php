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
            'email' => 'admin@surveyapp.com',
            'password' => bcrypt('secret'),
          ],

          [
            'email' => 'user@test.com',
            'password' => bcrypt('secret'),
          ]
        ]);
    }
}
