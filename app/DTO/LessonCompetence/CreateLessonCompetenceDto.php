<?php

namespace App\DTO\LessonCompetence;

use App\DTO\InitializeDtoTrait;

class CreateLessonCompetenceDto
{
    use InitializeDtoTrait;


    public string $content;
    public int $lessonTypeId;
}
