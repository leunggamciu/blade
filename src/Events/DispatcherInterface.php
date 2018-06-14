<?php

namespace Blade\Events;

interface DispatcherInterface
{
    public function listen($event, $handler);
    public function dispatch($event, $args);
}