<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <--- ADD THIS LINE
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::updateOrCreate(
        ['email' => 'r072islam@gmail.com'], // Your Gmail
        [
            'name' => 'Admin',
            'password' => Hash::make('rahat01812613387'),
            'role' => 'admin', // Ensure this matches your column name
        ]
    );
}
}
