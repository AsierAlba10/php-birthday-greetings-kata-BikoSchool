<?php

namespace BirthdayGreetingsKata\Infrastructure;

use BirthdayGreetingsKata\Infrastructure\Exceptions\FileDoesNotExistException;
use BirthdayGreetingsKata\Infrastructure\Exceptions\FileIsEmptyException;
use function PHPUnit\Framework\isEmpty;

class FileReaderTxt
{
    /**
     * @throws FileDoesNotExistException
     * @throws FileIsEmptyException
     */
    public function extractData(string $fileName): array
    {
        if(!is_readable($fileName))
        {
            throw new FileDoesNotExistException($fileName);
        }

        $lines = array_map(
            fn (string $line) => str_getcsv($line,', '),
            file($fileName,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
        );
        array_shift($lines);

        if(empty($lines)){
            throw new FileIsEmptyException($fileName);
        }

        return $lines;
    }
}