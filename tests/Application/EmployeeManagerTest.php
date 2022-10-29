<?php

namespace Tests\BirthdayGreetingsKata\Application;

use BirthdayGreetingsKata\Application\EmployeeManager;
use BirthdayGreetingsKata\Domain\Employee;
use BirthdayGreetingsKata\Infrastructure\Exceptions\TheEmployeeCanNotBeCreatedException;
use PHPUnit\Framework\TestCase;

class EmployeeManagerTest extends TestCase
{
    private EmployeeManager $employeeManager;

    /**
     * @setUp
     **/
    protected function setUp(): void
    {
        parent::setUp();

        $this->employeeManager = new EmployeeManager();
    }

    /**
     * @test
     **/
    public function theUserCanNotBeCreatedCorrectlyIfOneOfTheFieldsIsEmpty()
    {
        $employee = ['Asier', 'Alba', '1982/10/08', ''];

        $this->expectException(TheEmployeeCanNotBeCreatedException::class);

        $this->employeeManager->createEmployee($employee);
    }

}