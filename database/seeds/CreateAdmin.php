<?php

use Illuminate\Database\Seeder;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@test.loc',
        'password' => bcrypt('password'),
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
}
