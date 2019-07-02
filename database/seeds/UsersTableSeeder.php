<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'User One',
            'nickname' => 'test1',
            'email' => 'test1@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        User::create([
            'name' => 'User Two',
            'nickname' => 'test2',
            'email' => 'test2@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        User::create([
            'name' => 'User Three',
            'nickname' => 'test3',
            'email' => 'test3@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        User::create([
            'name' => 'User Four',
            'nickname' => 'test4',
            'email' => 'test4@example.com',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
    }
}
