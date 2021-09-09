<?php

declare(strict_types=1);

namespace Study\Bowling;

class Frame
{
    private int $firstPin;

    private ?int $secondPin;

    public function __construct(int $firstPin, ?int $secondPin = null)
    {
        $this->firstPin = $firstPin;
        $this->secondPin = $secondPin;
    }

    public function getFirstPin(): int
    {
        return $this->firstPin;
    }

    public function getSecondPin(): ?int
    {
        return $this->secondPin;
    }
}
