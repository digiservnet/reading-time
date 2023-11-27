<?php

namespace Icawebdesign\ReadingTime;

class ReadingTime
{
    protected string $suffix = 'minute read';

    public function __construct(
        protected int $wpm = 200,
    ) {
    }

    public function minutes(string $string): int
    {
        $wordCount = str_word_count($string);

        if ($wordCount <= $this->wpm) {
            return 1;
        }

        if ($wordCount % $this->wpm === 0) {
            return $wordCount / $this->wpm;
        }

        return (int)round(num: $wordCount / $this->wpm);
    }

    public function minutesWithSuffix(string $string, string $suffix = null): string
    {
        if ($suffix === null) {
            $suffix = $this->suffix;
        }

        return "{$this->minutes($string)} {$suffix}";
    }
}
