<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::query()->create([
            'role' => 1,
            'name' => 'Heaven',
            'email' => 'heaven@games.com',
            'password' => Hash::make('123456'),
            'avatar' => 'avatars/heaven.jpg',
            'verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
