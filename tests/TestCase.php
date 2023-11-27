<?php

namespace Icawebdesign\ReadingTime\Tests;

use Faker\Generator;
use Faker\Factory as FakerFactory;
use Icawebdesign\ReadingTime\Providers\ReadingTimeServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected ?Generator $faker;

    public function setUp(): void
    {
        parent::setUp();

        $this->faker = FakerFactory::create();
    }

    public function tearDown(): void
    {
        parent::tearDown();

        $this->faker = null;
    }

    protected function getPackageProviders($app): array
    {
        return [
            ReadingTimeServiceProvider::class,
        ];
    }
}
