<?php

declare(strict_types=1);

namespace Study\Bowling;

use PHPUnit\Framework\TestCase;

class BowlingTest extends TestCase
{
    /**
     * @var Bowling
     */
    private $SUT;

    protected function setUp(): void
    {
        $this->SUT = new Bowling();
    }

    public function testIsInstanceOfBowling(): void
    {

        $bowling = new Bowling();
        $bowling->run();
        $this->assertSame(44, $create->createFramesFromOriginScore('X1970'));
    }
}
