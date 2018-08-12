# PHP Locale Helpers
A collection of simple wrapper functions leveraging build-in PHP locale libraries

## Features

The library contains the following callable classes:
* Country
*  Language
*  Locale

Each class implements the following static functions:
  all()
  label(lookup,$locale)
  exists(lookup)

## Dependencies

This package is for use with PHP versions 5.3  and higher and requires supplemental installation of the php-intl extension

## Installation

### Install Using Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require humanized/php-locale-helpers "*"
```

or add

```
"humanized/php-locale-helpers": "*"
```

to the ```require``` section of your `composer.json` file.

