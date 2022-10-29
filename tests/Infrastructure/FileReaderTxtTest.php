<?php

namespace Tests\BirthdayGreetingsKata\Infrastructure;

use BirthdayGreetingsKata\Infrastructure\Exceptions\FileDoesNotExistException;
use BirthdayGreetingsKata\Infrastructure\Exceptions\FileIsEmptyException;
use BirthdayGreetingsKata\Infrastructure\FileReaderTxt;
use Mockery;
use PHPUnit\Framework\TestCase;

class FileReaderTxtTest extends TestCase
{
    private FileReaderTxt $fileReaderTxt;

    /**
     * @setUp
     **/
    protected function setUp(): void
    {
        parent::setUp();
        $this->fileReaderTxt = new FileReaderTxt();
    }

    /**
     * @test
     *
     * @throws FileIsEmptyException
     */
    public function fileIsNotReadable()
    {
        $filename = '';

        $this->expectException(FileDoesNotExistException::class);

        $this->fileReaderTxt->extractData($filename);
    }

    /**
     * @test
     * @throws FileDoesNotExistException
     * @throws FileIsEmptyException
     */
    public function fileIsNotEmpty()
    {
        $filename = __DIR__ . '/../resources/employee_data.txt';

        $lines = $this->fileReaderTxt->extractData($filename);

        $this->assertNotEmpty($lines);
    }

    /**
     * @test
     * @throws FileDoesNotExistException
     * @throws FileIsEmptyException
     */
    public function fileIsEmpty()
    {
        $filename = __DIR__ . '/../resources/employee_data_empty.txt';

        $this->expectException(FileIsEmptyException::class);

        $this->fileReaderTxt->extractData($filename);
    }

}