<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['designation', 'description','frontend','backend'];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'about_skill');
    }

    // Helper methods (optional but clean)
    public function frontendSkills()
    {
        return $this->skills()->where('category', 'frontend')->get();
    }

    public function backendSkills()
    {
        return $this->skills()->where('category', 'backend')->get();
    }
}
