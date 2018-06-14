# Blade

#### Introduction

Blade is a template engine extracted from `illuminate/view`. It drops all laravel related stuff, so that
we could use it as a common composer package in many cases.


#### Limitations

Since all laravel related stuff was droped, there are a few limitations when compared to the origin:

* no helper directives: `@dd`, `@dump`, `@method`, `@csrf`
* no translation directive: `@lang`
* no authentication directives: `@auth`, `@elseauth`, `@endauth`, `@guest`, `@elseguest`, `@endguest`
* no authorization directives: `@can`, `@elsecan`, `@endcan`, `@cannot`, `@elsecannot`, `@endelsecannot`
* no service injection directive: `@inject`
* no `with` magic like: `withError()`, but `with()` is still available
* no auto dependency injection in class style composer callback, because we drop the IoC container

#### Usage

```php
<?php

use Blade\Engines\EngineResolver;
use Blade\Engines\{CompilerEngine, PhpEngine, FileEngine};
use Blade\Compilers\BladeCompiler;
use Blade\Filesystem\Filesystem;
use Blade\Events\Dispatcher;
use Blade\ViewFinder;
use Blade\Factory;


$engineResolver = new EngineResolver;
$engineResolver->register('file', function() {
    return new FileEngine;
});
$engineResolver->register('php', function() {
    return new PhpEngine;
});
$engineResolver->register('blade', function() {
    $compiler = new BladeCompiler(new Filysystem, __DIR__ . '/compiled');
    return new CompilerEngine($compiler);
})

$viewFinder = new ViewFinder(new Filysystem, [__DIR__ . '/views']);
$eventDispatcher = new Dispatcher;

$factory = new Factory($engineResolver, $viewFinder, $eventDispatcher);
$factory->make('foo');

```