<?php

namespace App\DTO\Lesson;

use App\DTO\InitializeDtoTrait;
use Illuminate\Support\Facades\Date;

class CreateLessonDto
{
    use InitializeDtoTrait;


    public string $title;
    public int $unitId;
    public string $topicArea;
    public int $duration;
    public string $lessonDate;
    public string $instructions;
    public string $knowledge;
    public string $skills;
    public string $attitudeValues;
    public string $description;
    public string $teachingMaterial;
    public string $reference;
}