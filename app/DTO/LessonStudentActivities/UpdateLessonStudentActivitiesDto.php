<?php

namespace App\DTO\LessonStudentActivities;

use App\DTO\InitializeDtoTrait;

class UpdateLessonStudentActivitiesDto
{
    use InitializeDtoTrait;


    public string $content;
    public int $lessonTypeId;
}
