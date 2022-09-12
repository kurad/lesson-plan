<?php

namespace App\DTO\LessonParts;

use App\DTO\InitializeDtoTrait;

class UpdateLessonPartDto
{
    use InitializeDtoTrait;


    public string $type;
    public int $duration;
    public int $lessonId;
}