<?php

declare(strict_types=1);

namespace Study\Bowling;

class Frames
{
    private array $frames;

    public function __construct(string $pins) // すごく気持ち悪い気がするがこれは良いのか。
    {
        $this->frames = $this->separatePinsByFrame($pins);
    }

    public function getFrameFirstPin(int $frameNumber)
    {
        return $this->frames[$frameNumber]->getFirstPin(); // phpstormがarrayの中身がFrame型であるということをわかっていない。　　
    }

    public function getFrameSecondPin(int $frameNumber)
    {
        return $this->frames[$frameNumber]->getSecondPin(); // phpstormがわかってない
    }

    public function getNumberOfFrames(): int
    {
        return count($this->frames);
    }

    private function separatePinsByFrame(string $pins): array
    {
        $frames = [];
        $separatedPins = str_split($pins);
        $numberOfPins = count($separatedPins);
        $count = 0;

        while ($count < $numberOfPins) {
            if ($separatedPins[$count] === 'X') { // whileのなかにifがはいってしまっている
                $frames[] = new Frame(10);
                $count++;
                continue;
            }

            $frames[] = new Frame((int)$separatedPins[$count++], (int)$separatedPins[$count++]);
        }

        return $frames;
    }
}



