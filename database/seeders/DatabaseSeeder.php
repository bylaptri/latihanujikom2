<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

       User::create([
        'name' => 'admin1',
        'email' => 'admin1@gmail.com',
        'password' => Hash::make('12345'), //buat password selain pake Hash::make bisa juga pake bcrypt 
       ]); 
    }
}
