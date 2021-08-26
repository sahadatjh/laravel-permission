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
        $admin = Admin::where('email', 'sahadat@gmail.com')->first();
        if (is_null($admin)) {
            $admin = new Admin();
            $admin->name = "Sahadat Hossain";
            $admin->username = "sahadat";
            $admin->email = "sahadat@gmail.com";
            $admin->password = Hash::make('11223344');
            $admin->save();

            // $admin->assignRole(1);
        }
    }
}
