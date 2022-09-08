<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LessonPartCompetence extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'content',
        'lesson_id',

    ];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}