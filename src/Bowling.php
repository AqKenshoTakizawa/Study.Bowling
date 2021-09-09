<?php

declare(strict_types=1);

namespace Study\Bowling;

class Bowling
{
    public function run(): void
    {
        $game = new Game();
        echo $game->calculateOverallScore(), PHP_EOL;
    }
}
