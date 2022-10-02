# PHP library for calculating time to read an article.

[![Latest Stable Version](https://poser.pugx.org/icawebdesign/reading-time/version)](https://packagist.org/packages/icawebdesign/reading-time)
[![Total Downloads](https://poser.pugx.org/icawebdesign/reading-time/downloads)](https://packagist.org/packages/icawebdesign/reading-time)
[![License](https://poser.pugx.org/icawebdesign/reading-time/license)](https://packagist.org/packages/icawebdesign/reading-time)

## Requirements

* PHP 7.2.0+

## Installation
```bash
composer require icawebdesign/reading-time
```

### Usage
```php
// Return number of minutes
$readingTime = new ReadingTime();
$minutes = $readingTime->minutes($string); // eg: 5
```

```php
// Return minutes with suffix
$readingTime = new ReadingTime();
$readingLength = $readingTime->minutesWithSuffix($string); // eg: 5 minute read
```

```php
// Change reading speed (default: 250 words-per-minute)
$readingTime = new ReadingTime(400);
$minutes = $readingTime->minutes($string);
```

```php
// Change suffix string
$readingTime = new ReadingTime();
$readingLength = $readingTime->minutesWithSuffix($string, 'mins reading');
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ian.h@digiserv.net instead of using the issue tracker.

## Credits

- [Ian.H](https://github.com/icawebdesign)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
