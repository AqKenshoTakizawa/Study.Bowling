<?php

declare(strict_types=1);

namespace Study\Bowling;

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testCalculateOverallScore(): void
    {
        $game = new Game('X1970');
        $this->assertSame(44, $game->calculateOverallScore());
    }
}
