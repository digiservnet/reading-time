<?php

namespace Icawebdesign\ReadingTime\Providers;

use Icawebdesign\ReadingTime\ReadingTime;
use Illuminate\Support\ServiceProvider;

class ReadingTimeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register(): void
    {
        $this->app->bind('readingTime', function () {
            return new ReadingTime();
        });
    }
}
