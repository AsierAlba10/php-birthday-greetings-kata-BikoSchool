<?php

declare(strict_types=1);

namespace Tests\BirthdayGreetingsKata\Infrastructure;

use BirthdayGreetingsKata\Infrastructure\XDateRepository;
use PHPUnit\Framework\TestCase;

class XDateRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function getters()
    {
        $xDate = new XDateRepository('1789/01/24');
        $this->assertEquals(1, $xDate->getMonth());
        $this->assertEquals(24, $xDate->getDay());
    }

    /**
     * @test
     */
    public function isSameDate()
    {
        $xDate          = new XDateRepository('1789/01/24');
        $sameDay        = new XDateRepository('2001/01/24');
        $notSameDay     = new XDateRepository('1789/01/25');
        $notSameMonth   = new XDateRepository('1789/02/25');

        $this->assertTrue($xDate->isSameDay($sameDay),          'same');
        $this->assertFalse($xDate->isSameDay($notSameDay),      'not same day');
        $this->assertFalse($xDate->isSameDay($notSameMonth),    'not same month');
    }

    /**
     * @test
     */
    public function equality()
    {
        $base       = new XDateRepository("2000/01/02");
        $same       = new XDateRepository("2000/01/02");
        $different  = new XDateRepository("2000/01/04");

        $this->assertFalse($base->equals(null));
        $this->assertFalse($base->equals(''));
        $this->assertTrue($base->equals($base));
        $this->assertTrue($base->equals($same));
        $this->assertFalse($base->equals($different));
    }

}
