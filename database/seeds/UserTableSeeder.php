<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;

        $user->first_name = "Ohidul";
        $user->second_name = "hassan";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('secret');
        $user->user_type = "Super Admin";
        $user->activated = 1;
        $user->save();
    }
}
