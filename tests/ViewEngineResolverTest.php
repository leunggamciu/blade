<?php

namespace Blade\Tests;

use stdClass;
use PHPUnit\Framework\TestCase;

class ViewEngineResolverTest extends TestCase
{
    public function testResolversMayBeResolved()
    {
        $resolver = new \Blade\Engines\EngineResolver;
        $resolver->register('foo', function () {
            return new stdClass;
        });
        $result = $resolver->resolve('foo');

        $this->assertEquals(spl_object_hash($result), spl_object_hash($resolver->resolve('foo')));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testResolverThrowsExceptionOnUnknownEngine()
    {
        $resolver = new \Blade\Engines\EngineResolver;
        $resolver->resolve('foo');
    }
}
