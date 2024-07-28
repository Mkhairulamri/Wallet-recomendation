<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "Admin";
        $user->email = "email@gmail.com";
        $user->password = Hash::make('password');
        $user->level = "Admin";
        $user->save();

        $user = new User();
        $user->username = "User";
        $user->email = "user@gmail.com";
        $user->password = Hash::make('password');
        $user->level = "User";
        $user->save();
    }
}
