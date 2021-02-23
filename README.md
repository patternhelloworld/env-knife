# Env-Knife

## Overview

A library for extracting and validating env-functions such as env(), config() on sources

## Installation
```bash
composer require arwg/env-knife
```

## Usage

Simple to use. Only inputting the function name is required. 
The thing is that no key-value setup is required.

```php

      $envKnife = new EnvKnife();
      
      // For the first parameter, you can set any function name you are using for loading environment variables.
      
      // Detect funcs such as env('URL'), env("APP_CRITICAL", 5) 
      // !! Variable types are limited to 'string, numeric, boolean'
      $envKnife->parseResults('env', base_path(), ['app', 'bootstrap', 'config', 'routes']);
      
      // Detect when 'env('URL') returns null'
      $results = $envKnife->getEmptyResults();     

      // Detect funcs such as config('abc'), config("ABC_CRITICAL", 5) 
      // !! Variable types are limited to 'string, numeric, boolean'
      $envKnife->parseResults('config', base_path(), ['app', 'bootstrap', 'config']);
      
      $results = $envKnife->getEmptyResults();
      
      // Detect errors such as "undefined index 'c'" in config('abc')['v']['c'] in case that there is no 'c'.
      $results2 = $envKnife->getErrorResults();
```


### Changelog

[Changelog](CHANGELOG.md)

## License

[License File](LICENSE)
