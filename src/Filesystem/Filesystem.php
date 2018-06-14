<?php

namespace Blade\Filesystem;

class Filesystem
{
    public function exists($path)
    {
        return file_exists($path);
    }

    public function get($path)
    {
        return file_get_contents($path);
    }

    public function put($path, $content)
    {
        return file_put_contents($path, $content);
    }

    public function lastModified($path)
    {
        return filemtime($path);
    }
}