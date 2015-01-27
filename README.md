# AppShed Extension API

This is the api for remote screens.

## Installing

### Composer

You can install the API in your project just add `"appshed/extension-api": "*"` to your composer.json and run `composer update appshed/extension-api`.

### Phar

If you don't want to use composer, you can [download the phar](https://raw.githubusercontent.com/AppShed/extension-api/master/build/appshed-api.phar). This is a package of everything you need, you just need to `require_once 'appshed-api.phar'`.

## Examples

Be sure to run `composer install` if you want to run the examples

## Docs

You can see the api docs on [github pages](http://appshed.github.io/extension-api/)

## Contributing

### Phar

Please be sure to update the phar before committing. You need to use [Box](http://box-project.org/) to do this.

Just run `box build -v`.

You might need to run `composer install` to get the autoloading files generated.

### Docs

You can run `[sami.php](https://github.com/fabpot/sami) update sami.php` to generate the API doc.

You can then commit the doc folder to the `gh-pages` branch, something like:

    mv doc ~/doc-tmp
    git checkout gh-pages
    rm -rf .
    mv ~/doc-tmp/* .
    git add .
    git commit
    
