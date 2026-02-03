<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
        // Frontend
        ['name' => 'HTML', 'category' => 'frontend'],
        ['name' => 'CSS', 'category' => 'frontend'],
        ['name' => 'JavaScript', 'category' => 'frontend'],
        ['name' => 'Bootstrap', 'category' => 'frontend'],
        ['name' => 'Tailwind CSS', 'category' => 'frontend'],
        ['name' => 'React', 'category' => 'frontend'],
        ['name' => 'Vue.js', 'category' => 'frontend'],
        ['name' => 'TypeScript', 'category' => 'frontend'],

        // Backend & Databases
        ['name' => 'PHP', 'category' => 'backend'],
        ['name' => 'Laravel', 'category' => 'backend'],
        ['name' => 'Python', 'category' => 'backend'],
        ['name' => 'Django', 'category' => 'backend'],
        ['name' => 'PostgreSQL', 'category' => 'backend'],
        ['name' => 'MySQL', 'category' => 'backend'],
        ['name' => 'REST API', 'category' => 'backend'],
        ['name' => 'Docker', 'category' => 'backend'],
        ['name' => 'Git', 'category' => 'backend'],
        ['name' => 'Postman', 'category' => 'backend'],
    ];

    foreach ($skills as $skill) {
        Skill::create($skill);
    }
    }
}
