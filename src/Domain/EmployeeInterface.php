<?php

declare(strict_types=1);

namespace BirthdayGreetingsKata\Domain;

use BirthdayGreetingsKata\Infrastructure\XDateRepository;

interface EmployeeInterface
{
    public function isBirthday(XDateRepository $today): bool;

    public function getEmail(): string;

    public function getFirstName(): string;

    public function __toString(): string;

    public function equals($obj): bool;
}
