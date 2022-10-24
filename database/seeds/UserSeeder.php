<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Marco Sangiorgi',
            'email' => 'sangiothebest@hotmail.com',
            'password' => Hash::make('boolean1'),
        ]);
    }
}
