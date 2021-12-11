# Generate whole crud functionality with ease

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devs-buddy/crudgen.svg?style=flat-square)](https://packagist.org/packages/devs-buddy/crudgen)
[![Build Status](https://img.shields.io/travis/devs-buddy/crudgen/master.svg?style=flat-square)](https://travis-ci.org/devs-buddy/crudgen)
[![Quality Score](https://img.shields.io/scrutinizer/g/devs-buddy/crudgen.svg?style=flat-square)](https://scrutinizer-ci.com/g/devs-buddy/crudgen)
[![Total Downloads](https://img.shields.io/packagist/dt/devs-buddy/crudgen.svg?style=flat-square)](https://packagist.org/packages/devs-buddy/crudgen)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:
``` bash
composer require devs-buddy/crudgen --dev
```
Once the package is installed, you should register the `DevsBuddy\Crudgen\CrudgenServiceProvider` service provider. Normally, Laravel 5.5+ will register the service provider automatically.

As we are dependent in a third party package, so you will need to publish it's content to get started

``` bash
php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"
```
<strong>Note:</strong> You can know more about this package here [appzcoder/crud-generator docs](https://github.com/appzcoder/crud-generator/blob/master/doc/installation.md)


You can publish everything (Publishable) from `DevsBuddy/Crudgen` by this command:
``` bash
php artisan vendor:publish --provider=DevsBuddy/Crudgen/CrudgenServiceProvider
```

<b>Alternatively you can publish them separately.</b>

Now publish `assets` from `DevsBuddy/Crudgen` package by running:
``` bash
php artisan vendor:publish --tag=crudgen_assets
```
Now publish `config` from `DevsBuddy/Crudgen` package by running:
```bash
php artisan vendor:publish --tag=crudgen_config
```

## Usage

``` php
// Usage description here
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please send a mail at `info@devsbuddy.com` instead of using the issue tracker.

## Credits

- [appzcoder/crud-generator](https://github.com/appzcoder/crud-generator/)
- [Shoaib Khan (DevsBuddy)](https://github.com/devs-buddy)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

##Thank You
If you are using our package, and it is helpful for you then please appreciate our work by writing a review here: 

[Write A Review](https://devsbuddy.com/feedback?src=crudgen)

### Donation
Please consider donating to the author of the package for their efforts, So they can continue their work by creating and updating these packages which are very helpful for each of you.

[Donate Here](https://devsbuddy.com/public/donate?src=crudgen)

