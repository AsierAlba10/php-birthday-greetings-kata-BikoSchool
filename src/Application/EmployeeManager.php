<?php

namespace BirthdayGreetingsKata\Application;

use BirthdayGreetingsKata\Infrastructure\EmployeeRepository;
use BirthdayGreetingsKata\Infrastructure\Exceptions\TheEmployeeCanNotBeCreatedException;

class EmployeeManager
{
    /**
     * @throws TheEmployeeCanNotBeCreatedException
     */
    public function createEmployee($employee): EmployeeRepository
    {
        $employeeData = array_map('trim', $employee);
        if($this->thereAreEmptyFields($employeeData)){
            throw new TheEmployeeCanNotBeCreatedException();
        }
        return new EmployeeRepository($employeeData[1], $employeeData[0], $employeeData[2], $employeeData[3]);
    }

    private function thereAreEmptyFields(array $employeeData): bool
    {
        if(empty($employeeData[0]) || empty($employeeData[1]) || empty($employeeData[2]) || empty($employeeData[3])){
            return true;
        }
        return false;
    }
}