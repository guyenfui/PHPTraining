<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'    => 'admin',
            'email'    => 'admin1@gmail.com',
            'password'   =>  Hash::make('Password123'),
            'remember_token' =>  str_random(10),
        ]);
    }
}