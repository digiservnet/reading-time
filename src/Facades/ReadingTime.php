<?php

namespace Icawebdesign\ReadingTime\Facades;

use Illuminate\Support\Facades\Facade;

class ReadingTime extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'readingTime';
    }
}
