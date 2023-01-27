<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Repository\User\UserRepository; 
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRepository = new UserRepository(new User);
        $userRepository->create([
            'name' => 'amir',
            'email' => 'ali@gmail.com',
            'card_number' => '0440679898',
            'password' => Hash::make('123'),
        ]);
    }
}
