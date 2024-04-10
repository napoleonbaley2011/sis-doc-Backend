<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin')
        ]);

        $admin->assignRole('admin');

        $transcriptor = User::create([
            'name' => 'transcriptor',
            'email' => 'transcriptor@example.com',
            'password' => Hash::make('editor')
        ]);

        $transcriptor->assignRole('transcriptor');
    }
}
