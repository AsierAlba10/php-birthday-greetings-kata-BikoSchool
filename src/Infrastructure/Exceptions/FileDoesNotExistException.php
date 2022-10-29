<?php

namespace BirthdayGreetingsKata\Infrastructure\Exceptions;

use Exception;

class FileDoesNotExistException extends Exception
{
    public function __construct(string $fileName)
    {
        parent::__construct(`File {$fileName} does not exist`);
    }
}