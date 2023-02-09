<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','nafiur@outlook.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Nafiur Rahman";
            $user->username = "nafiur";
            $user->email = "nafiur@outlook.com";
            $user->password = bcrypt("password");
            $user->save();
            }
    }
}
