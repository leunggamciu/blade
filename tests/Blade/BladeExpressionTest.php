<?php

namespace Blade\Tests\Blade;

class BladeExpressionTest extends AbstractBladeTestCase
{
    public function testExpressionsOnTheSameLine()
    {
        //
    }

    public function testExpressionWithinHTML()
    {
        $this->assertEquals('<html <?php echo e($foo); ?>>', $this->compiler->compileString('<html {{ $foo }}>'));
        $this->assertEquals('<html<?php echo e($foo); ?>>', $this->compiler->compileString('<html{{ $foo }}>'));
    }
}
