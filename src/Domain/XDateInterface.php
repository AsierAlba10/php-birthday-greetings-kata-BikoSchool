<?php

declare(strict_types=1);

namespace BirthdayGreetingsKata\Domain;

use BirthdayGreetingsKata\Infrastructure\XDateRepository;

interface XDateInterface
{
    public function getDay(): int;

    public function getMonth(): int;

    public function isSameDay(XDateRepository $anotherDate): bool;

    public function equals($obj): bool;

    public function __toString(): string;
}
