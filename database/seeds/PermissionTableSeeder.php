<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('permissions')->insert([
          [
              'name' => 'create-user',
              'display_name' => 'Create',
              'description' => 'Create New User'
          ],
          [
              'name' => 'list-user',
              'display_name' => 'Display User List',
              'description' => 'List All User'
          ],
          [
              'name' => 'update-user',
              'display_name' => 'Update user',
              'description' => 'Update User Information'
          ],
          [
              'name' => 'delete-user',
              'display_name' => 'Delete User',
              'description' => 'Delete User'
          ],
      ]);
    }
}
