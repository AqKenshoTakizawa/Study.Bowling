<?php

declare(strict_types=1);

namespace Study\Bowling;

class Game
{
    private Frames $frames;

    public function __construct(string $pins)
    {
        $this->frames = new Frames($pins);
    }

    public function calculateOverallScore()
    {
        $length = $this->frames->getNumberOfFrames();
        $sum = 0;

        for ($numberOfLane = 0; $numberOfLane < $length; $numberOfLane++) {
            $sum = $this->calculatePerFrameScore($sum, $numberOfLane);

            if (is_string($sum)) { //forのなかにifが入ってしまっている
                return $sum;
            }
        }

        return $sum;
    }

    public function calculatePerFrameScore(int $sum, int $numberOfLane)
    {
        if ($this->frames->getFrameFirstPin($numberOfLane) === 10) {
            return $this->getStrikeScore($sum, $numberOfLane);
        }

        if (
            $this->frames->getFrameFirstPin($numberOfLane)
            + $this->frames->getFrameSecondPin($numberOfLane)
            === 10
        ) {
            return $this->getSpareScore($sum, $numberOfLane);
        }

        return $sum + $this->frames->getFrameFirstPin($numberOfLane) + $this->frames->getFrameSecondPin($numberOfLane);
    }

    public function getStrikeScore(int $sum, int $numberOfLane)
    {
        if ($numberOfLane + 2 >= $this->frames->getNumberOfFrames()) {
            return $sum . 'U';
        }

        if (
            $this->frames->getFrameFirstPin($numberOfLane + 1) === 10
            &&
            $this->frames->getFrameFirstPin($numberOfLane + 2) === 10
        ) {
            return $sum
                + $this->frames->getFrameFirstPin($numberOfLane)
                + $this->frames->getFrameFirstPin($numberOfLane + 1)
                + $this->frames->getFrameFirstPin($numberOfLane + 2);
        } // 次のifのreturnと同じことをしているが、条件が違うのであえて分けている

        if (
            $this->frames->getFrameFirstPin($numberOfLane + 1) === 10
            &&
            $this->frames->getFrameFirstPin($numberOfLane + 2) !== 10
        ) {
            return $sum
                + $this->frames->getFrameFirstPin($numberOfLane)
                + $this->frames->getFrameFirstPin($numberOfLane + 1)
                + $this->frames->getFrameFirstPin($numberOfLane + 2);
        }

        return $sum
            + $this->frames->getFrameFirstPin($numberOfLane)
            + $this->frames->getFrameFirstPin($numberOfLane + 1)
            + $this->frames->getFrameSecondPin($numberOfLane + 1);
    }

    public function getSpareScore(int $sum, int $numberOfLane)
    {
        if ($numberOfLane + 1 >= $this->frames->getNumberOfFrames()) {
            return $sum . 'U';
        }

        if ($this->frames->getFrameFirstPin($numberOfLane + 1) === 10) {
            return $sum
                + $this->frames->getFrameFirstPin($numberOfLane)
                + $this->frames->getFrameSecondPin($numberOfLane)
                + $this->frames->getFrameFirstPin($numberOfLane + 1);
        }

        return $sum
            + $this->frames->getFrameFirstPin($numberOfLane)
            + $this->frames->getFrameSecondPin($numberOfLane)
            + $this->frames->getFrameFirstPin($numberOfLane + 1);
    }
}
