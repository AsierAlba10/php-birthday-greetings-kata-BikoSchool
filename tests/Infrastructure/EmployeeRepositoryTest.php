<?php
declare(strict_types=1);

namespace Tests\BirthdayGreetingsKata\Infrastructure;

use BirthdayGreetingsKata\Domain\XDate;
use BirthdayGreetingsKata\Infrastructure\EmployeeRepository;
use BirthdayGreetingsKata\Infrastructure\XDateRepository;
use PHPUnit\Framework\TestCase;

class EmployeeRepositoryTest extends TestCase
{
    /**
     * @setUp
     **/
    protected function setUp():void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function birthday()
    {
        $employee = new EmployeeRepository('foo', 'bar', '1990/01/31', 'a@b.c');
        $this->assertFalse($employee->isBirthday(new XDateRepository('2008/01/30')), 'not his birthday');
        $this->assertTrue($employee->isBirthday(new XDateRepository('2008/01/31')), 'his birthday');
    }

    /**
     * @test
     */
    public function equality()
    {
        $base       = new EmployeeRepository('First', 'Last', '1999/09/01', 'first@last.com');
        $same       = new EmployeeRepository('First', 'Last', '1999/09/01', 'first@last.com');
        $different  = new EmployeeRepository('First', 'Last', '1999/09/01', 'boom@boom.com');

        $this->assertFalse($base->equals(null));
        $this->assertFalse($base->equals(''));
        $this->assertTrue($base->equals($same));
        $this->assertFalse($base->equals($different));
    }
}
