<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Pietro';
        $user->email = 'pietro@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
    }
}
