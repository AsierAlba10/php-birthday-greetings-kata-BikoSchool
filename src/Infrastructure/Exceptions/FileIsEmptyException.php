<?php

namespace BirthdayGreetingsKata\Infrastructure\Exceptions;

use Exception;

class FileIsEmptyException extends Exception
{
    public function __construct(string $fileName)
    {
        parent::__construct(`File {$fileName} is empty`);
    }
}