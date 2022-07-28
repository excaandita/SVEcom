<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos',
        'skills_id'
    ];

    protected $hidden = [

    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skills_id', 'id');
    }
}

