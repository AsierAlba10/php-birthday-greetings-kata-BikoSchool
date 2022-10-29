<?php

namespace BirthdayGreetingsKata\Infrastructure\Exceptions;

use Exception;

class TheEmployeeCanNotBeCreatedException extends Exception
{
    public function __construct()
    {
        parent::__construct('The employee can not be created correctly');
    }
}