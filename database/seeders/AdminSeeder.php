<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() 
    {
        $user = new User;
        $user->name = "Admin Ihsan";
        $user->email = "ihsan@admin.com";
        $user->level = "admin";
        $user->password = "12345678";
        $user->save();
    }
}
