<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'super-admin',
            'email' => 'automed@gmail.com',
            'phone'=>'+9989377372',
            'job'=>'Admin',
            'address'=>'Poland Warsaw',
            'birthday'=>'1999-13-01',
            'password' => Hash::make('automed@gmail.com'),
        ]);

        // Add more users as needed
        User::create([
            'name' => 'Master',
            'email' => 'master@gmail.com',
            'phone'=>'+9989973372',
            'job'=>'master',
            'address'=>'Poland Warsaw',
            'birthday'=>'1999-13-01',
            'password' => Hash::make('master@gmail.com'),
        ]);
        User::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'phone'=>'+99899577372',
            'job'=>'seller',
            'address'=>'Poland Warsaw',
            'birthday'=>'1999-13-01',
            'password' => Hash::make('seller@gmail.com'),
        ]);
    }
}
