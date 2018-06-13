<?php

namespace Blade\Tests\Blade;

class BladeEndSectionsTest extends AbstractBladeTestCase
{
    public function testEndSectionsAreCompiled()
    {
        $this->assertEquals('<?php $__env->stopSection(); ?>', $this->compiler->compileString('@endsection'));
    }
}
