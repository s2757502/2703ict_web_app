<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => bcrypt('123456')
        ]);

        DB::table('users')->insert([
            'name' => 'Fred',
            'email' => 'fred@gmail.com',
            'password' => bcrypt('123456')
        ]);

        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'john@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
