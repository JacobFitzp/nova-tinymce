<img src="https://banners.beyondco.de/Nova%20TinyMCE%20Field.png?theme=light&packageManager=composer+require&packageName=jacobfitzp%2Fnova-tinymce&pattern=architect&style=style_1&description=TinyMCE+field+for+Laravel+Nova&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg">

## Installation

You can install the package via composer:

```shell
composer require jacobfitzp/nova-tinymce
```

## Usage

Before you can start using the TinyMCE field you need to set your API key, the easiest way to do this is by setting `TINYMCE_API_KEY` in your apps `.env`. Alternatively you can publish the configuration file and set it there.

Now you can simply use the `Tinymce` field in your Nova resource:

```php
Tinymce::make('Content')
    ->fullWidth(),
```

## Configuration

Publish the configuration file:

```shell
php artisan vendor:publish --tag=nova-tinymce
```

## License

The MIT License (MIT). Please see License File for more information.
