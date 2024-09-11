<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'wenda berutu',
            'level'=>'admin',
            'email'=>'wendaberutu@gmail.com',
            'password'=>bcrypt('12345'),
            'remember_token'=>Str::random(60),
        ]);
        
        User::create([
            'name' => 'Customer User',
            'level' => 'customer',
            'email' => 'customer@example.com',
            'password' => bcrypt('customer123'),
            'remember_token' => Str::random(60),
        ]);
        
    }
}
