<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = \App\User::create([
            'name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('super_admin@app.com'),
        ]);

        $user->attachRole('super_admin');

    }//end of run
}
