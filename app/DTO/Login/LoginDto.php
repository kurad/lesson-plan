<?php

namespace App\DTO\Login;

use App\DTO\InitializeDtoTrait;

class LoginDto
{
    use InitializeDtoTrait;


    public string $email;
    public string $password;
}
