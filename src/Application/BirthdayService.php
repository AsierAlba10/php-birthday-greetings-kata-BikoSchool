<?php

declare(strict_types=1);

namespace BirthdayGreetingsKata\Application;

use BirthdayGreetingsKata\Domain\XDate;
use BirthdayGreetingsKata\Infrastructure\BirthdayGreetignsSender;
use BirthdayGreetingsKata\Infrastructure\Exceptions\FileDoesNotExistException;
use BirthdayGreetingsKata\Infrastructure\Exceptions\FileIsEmptyException;
use BirthdayGreetingsKata\Infrastructure\Exceptions\TheEmployeeCanNotBeCreatedException;
use BirthdayGreetingsKata\Infrastructure\FileReaderTxt;
use BirthdayGreetingsKata\Infrastructure\XDateRepository;

final class BirthdayService
{
    private FileReaderTxt $fileReaderTxt;
    private BirthdayGreetignsSender $birthdayGreetignsSender;
    private EmployeeManager $employeeManager;

    /**
     * BirthdayService constructor.
     */
    public function __construct()
    {
        $this->fileReaderTxt = new FileReaderTxt();
        $this->birthdayGreetignsSender = new BirthdayGreetignsSender();
        $this->employeeManager = new EmployeeManager();
    }

    /**
     * @throws FileDoesNotExistException|FileIsEmptyException|TheEmployeeCanNotBeCreatedException
     */
    public function sendGreetings($fileName, XDateRepository $xDate, $smtpHost, $smtpPort): void
    {
        $allEmployeesData = $this->fileReaderTxt->extractData($fileName);

        foreach ($allEmployeesData as $employeeData){
            $employee = $this->employeeManager->createEmployee($employeeData);
            if ($employee->isBirthday($xDate)) {
                $this->birthdayGreetignsSender->send($employee, $smtpHost, $smtpPort);
            }
        }
    }
}
