<?php

namespace App\DTO\Classes;

use App\DTO\InitializeDtoTrait;

class UpdateClassDto
{
    use InitializeDtoTrait;


    public string $name;
    public int $size;
    public int $SEN;
    public string $location;
}