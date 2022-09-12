<?php

namespace App\DTO\LessonPartTeacherActivities;

use App\DTO\InitializeDtoTrait;

class UpdateLessonPartTeacherActivitiesDto
{
    use InitializeDtoTrait;


    public string $content;
    public int $lessonTypeId;
}
