<?php

namespace Blade\Tests\Blade;

use Mockery as m;
use PHPUnit\Framework\TestCase;
use Blade\Compilers\BladeCompiler;

abstract class AbstractBladeTestCase extends TestCase
{
    protected $compiler;

    public function setUp()
    {
        $this->compiler = new BladeCompiler(m::mock('Blade\Filesystem\Filesystem'), __DIR__);
        parent::setUp();
    }

    public function tearDown()
    {
        m::close();

        parent::tearDown();
    }
}
