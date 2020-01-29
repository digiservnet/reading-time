<?php

namespace Icawebdesign\ReadingTime;

class ReadingTime
{
    protected $wpm = 200;

    protected $suffix = 'minute read';

    public function __construct(int $wpm = 200)
    {
        $this->wpm = $wpm;
    }

    public function minutes(string $string): int
    {
        $wordCount = str_word_count($string);

        if ($wordCount <= $this->wpm) {
            return 1;
        }

        if (0 === $wordCount % $this->wpm) {
            return $wordCount / $this->wpm;
        }

        return round($wordCount / $this->wpm, 0, PHP_ROUND_HALF_UP);
    }

    public function minutesWithSuffix(string $string, string $suffix = null): string
    {
        if (null === $suffix) {
            $suffix = $this->suffix;
        }

        return sprintf('%d %s', $this->minutes($string), $suffix);
    }
}
