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
    // 1. Create the Skills so the Checkboxes show up on your Edit page
    $skills = [
        ['name' => 'HTML', 'category' => 'frontend'],
        ['name' => 'CSS', 'category' => 'frontend'],
        ['name' => 'JavaScript', 'category' => 'frontend'],
        ['name' => 'TailwindCSS', 'category' => 'frontend'],
        ['name' => 'Bootstrap', 'category' => 'frontend'],
        ['name' => 'Laravel', 'category' => 'backend'],
        ['name' => 'Django', 'category' => 'backend'],
        ['name' => 'RestAPI', 'category' => 'backend'],
        ['name' => 'PHP', 'category' => 'backend'],
        ['name' => 'Python', 'category' => 'backend'],
        ['name' => 'PostgreSQL', 'category' => 'backend'],
        ['name' => 'MySQL', 'category' => 'backend'],
        ['name' => 'Docker', 'category' => 'backend'],
        ['name' => 'Postman', 'category' => 'backend'],
    ];

    foreach ($skills as $skill) {
        \App\Models\Skill::updateOrCreate(['name' => $skill['name']], $skill);
    }
}
}
