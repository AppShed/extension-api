# AppShed Extension API

This is the api for remote screens.

[![Latest Stable Version](https://poser.pugx.org/appshed/extension-api/v/stable.png)](https://packagist.org/packages/appshed/extension-api)
[![License](https://poser.pugx.org/appshed/extension-api/license.png)](https://packagist.org/packages/appshed/extension-api)
[![Build Status](https://travis-ci.org/appshed/extension-api.svg?branch=master)](https://travis-ci.org/appshed/extension-api)

## Installing

### Composer

You can install the API in your project just add `"appshed/extension-api": "*"` to your composer.json and run `composer update appshed/extension-api`.

### Phar

If you don't want to use composer, you can [download the phar](https://raw.githubusercontent.com/AppShed/extension-api/master/build/appshed-api.phar). This is a package of everything you need, you just need to `require_once 'appshed-api.phar'`.

## Examples

Be sure to run `composer install` if you want to run the examples

## Docs

You can run `[sami](https://github.com/fabpot/sami) update sami.php` to generate the API doc.

## Contributing

Please be sure to update the phar before committing. You need to use [Box](http://box-project.org/) to do this.

Just run `box build -v`.
