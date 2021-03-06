<?php

/*
 * This file is part of the `src-run/wonka-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Wonka\Tests\Utility\Reflection;

/**
 * Class ClassReflectionUnitMockChildTrait.
 */
trait ClassReflectionUnitMockChildTrait
{
    public function publicFunctionChildTrait()
    {
        return 'public::'.__METHOD__;
    }

    protected function protectedFunctionChildTrait()
    {
        return 'protected::'.__METHOD__;
    }

    private function privateFunctionChildTrait()
    {
        return 'private::'.__METHOD__;
    }
}

/* EOF */
