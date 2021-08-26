<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::where('email', 'sahadat@gmail.com')->first();
        if (is_null($user)) {
            $user = new Admin();
            $user->name = "Sahadat Hossain";
            $user->username = "sahadat";
            $user->email = "sahadat@gmail.com";
            $user->password = Hash::make('11223344');
            $user->save();
        }
    }
}
