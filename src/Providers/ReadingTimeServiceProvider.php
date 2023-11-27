<?php

namespace Icawebdesign\ReadingTime\Providers;

use Illuminate\Support\ServiceProvider;
use Icawebdesign\ReadingTime\ReadingTime;

class ReadingTimeServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->app->bind('readingTime', function () {
            return new ReadingTime();
        });
    }
}
