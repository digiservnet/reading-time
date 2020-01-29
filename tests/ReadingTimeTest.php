<?php

namespace Icawebdesign\ReadingTime\Tests;

use Faker\Factory as FakerFactory;
use Icawebdesign\ReadingTime\ReadingTime;
use PHPUnit\Framework\TestCase;

class ReadingTimeTest extends TestCase
{
    protected const WPM = 200;

    /** @var FakerFactory */
    protected $faker;

    public function setUp(): void
    {
        $this->faker = FakerFactory::create();
    }

    public function tearDown(): void
    {
        $this->faker = null;
    }

    protected function generateWords(int $wordCount = null): string
    {
        if (null === $wordCount) {
            $wordCount = self::WPM;
        }

        return implode(' ', $this->faker->words($wordCount));
    }

    /** @test */
    public function calculationReturnsAValidInteger(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords()));
    }

    /** @test */
    public function smallerWordCountThanWpmReturns1(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords(10)));
    }

    /** @test */
    public function wordCountJustOverWpmReturnsRoundedDownMinutes(): void
    {
        $this->assertEquals(1, (new ReadingTime())->minutes($this->generateWords(self::WPM + 20)));
    }

    /** @test */
    public function wordCountHalfWayBetweenMultiplesOfWpmReturnsRoundedUpMinutes(): void
    {
        $this->assertEquals(
            2,
            (new ReadingTime())->minutes($this->generateWords(self::WPM + (self::WPM / 2)))
        );
    }

    /** @test */
    public function calculationWithSuffixReturnsANumberOfMinutesAndTheSuffix(): void
    {
        $this->assertSame(
            '2 minute read',
            (new ReadingTime())->minutesWithSuffix($this->generateWords(self::WPM * 2))
        );
    }
}
