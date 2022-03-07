<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
			array(
				'name' => 'Remedy',
				'email' => 'remedy@gmail.com',
				'password' => Hash::make('123456'),
				'email_verified_at' => now()
			),
        );

        foreach ($data as $user) {
			$user_exists = User::where('email', $user['email'])->exists();
			if (!$user_exists) {
                User::create($user);
            }
        }
    }
}
