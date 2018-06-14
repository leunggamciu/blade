<?php

namespace Blade\Events;

class Dispatcher implements DispatcherInterface
{
    protected $handlers = [];

    public function listen($event, $handler)
    {
        if (isset($handlers[$event])) {
            $this->handlers[$event][] = $handler;
        } else {
            $this->handlers[$event] = [$handler];
        }
    }

    public function dispatch($event, $args)
    {
        $handlers = $this->handlers[$event] ?? [];
        foreach ($handlers as $handler) {
            call_user_func_array($handler, $args);
        }
    }
}