<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'sahadat@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Sahadat Hossain";
            $user->email = "sahadat@gmail.com";
            $user->password = Hash::make('11223344');
            $user->save();
        }
    }
}
