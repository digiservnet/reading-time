<?php

namespace Icawebdesign\ReadingTime\Tests;

use Faker\Factory;
use Faker\Generator;
use Icawebdesign\ReadingTime\ReadingTime;
use Icawebdesign\ReadingTime\Facades\ReadingTime as ReadingTimeFacade;

class ReadingTimeTest extends TestCase
{
    protected const WPM = 200;
    protected ?Generator $faker;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

    /** @test */
    public function calculation_returns_a_valid_integer(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords()));
    }

    protected function generateWords(int $wordCount = null): string
    {
        if ($wordCount === null) {
            $wordCount = self::WPM;
        }

        $words = $this->faker?->words($wordCount);

        return implode(' ', $words);
    }

    /** @test */
    public function smaller_word_count_than_wpm_returns_1(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords(10)));
    }

    /** @test */
    public function word_count_just_over_wpm_returns_rounded_down_minutes(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords(self::WPM + 20)));
    }

    /** @test */
    public function word_count_half_way_between_multiples_of_wpm_returns_rounded_up_minutes(): void
    {
        $this->assertEquals(
            2,
            (new ReadingTime())->minutes($this->generateWords(self::WPM + (self::WPM / 2))),
        );
    }

    /** @test */
    public function calculation_with_suffix_returns_a_number_of_minutes_and_the_suffix(): void
    {
        $this->assertSame(
            '2 minute read',
            (new ReadingTime())->minutesWithSuffix($this->generateWords(wordCount: self::WPM * 2)),
        );
    }

    /** @test */
    public function using_a_facade_returns_a_correct_word_count(): void
    {
        $this->assertSame(
            1,
            ReadingTimeFacade::minutes($this->generateWords(wordCount: self::WPM)),
        );
    }
}
