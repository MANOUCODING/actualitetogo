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
        User::create([
            'nomComplet' => "Alexandre DENANYO",
            'username' => "MawuwonamTG",
            'email' =>  "manouadjanor@gmail.com",
            'role_name' => "admin",
            'password' => Hash::make("emideljesus2020@amen")
        ]);

        User::create([
            'nomComplet' => "Joel DENANYO",
            'username' => "delomepub",
            'email' =>  "delomepub@gmail.com",
            'role_name' => "author",
            'password' => Hash::make("123456789")
        ]);
    }
}
