<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'Administrator',
            'username' => 'admin',
            'password'  => Hash::make('moat4ever'),
            'role'  => 'admin'
        ]);
    }
}
