<?php

namespace Database\Seeders;
use App\Models\User;


use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'emp_id' => '1',
            'user_role' => '1',
            'username' => 'company@example.com',
            'email' => 'hontucankenneth@gmail.com',
            'email_verified_at' => null,
            'password' => '123456',
            'remember_token' => null,
            'created_by' => '1',
            'updated_by' => '1'
        ]);

        User::create([
            'emp_id' => '2',
            'user_role' => '2',
            'username' => 'cyber123',
            'email' => 'cyber.angustia@gmail.com',
            'email_verified_at' => null,
            'password' => '123456',
            'remember_token' => null,
            'created_by' => '1',
            'updated_by' => '1'
        ]);
    }
}
