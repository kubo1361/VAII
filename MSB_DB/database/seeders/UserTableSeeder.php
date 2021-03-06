<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create(['username' => 'admin', 'email' => 'admin@admin.com', 'password' => bcrypt('admin'), 'is_admin' => '1', 'enabled' => '1', 'remember_token' => Str::random(10), 'email_verified_at' => now()]);
        User::create(['username' => 'test', 'email' => 'test@test.com', 'password' => bcrypt('test'), 'is_admin' => '0', 'enabled' => '1', 'remember_token' => Str::random(10), 'email_verified_at' => now()]);
        User::factory()->times(10)->create();
    }
}
