<?php

/*
 * This file is part of the scribe/wonka-bundle.
 *
 * (c) Scribe Inc. <rmf@scr.be>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Wonka\Utility;

use Scribe\Wonka\Utility\StaticClass\StaticClassTrait;
use Scribe\Wonka\Exception\InvalidArgumentException;

/**
 * Class Math.
 */
class Math
{
    /*
     * disallow instantiation
     */
    use StaticClassTrait;

    /**
     * Convert an integer from one base to another with optional prevision.
     *
     * @param int      $integer      Integer value to convert
     * @param int      $base         Current base of integer
     * @param int      $newBase      New base of integer
     * @param int|null $precision    Optionally round converted integer to specified precision
     * @param bool     $newBaseAsMax If set to true the converted integer will not be allowed to exceed the new base
     *
     * @throws InvalidArgumentException
     *
     * @return int
     */
    public static function toBase($integer, $base, $newBase, $precision = null, $newBaseAsMax = false)
    {
        if (0 === (int) $base) {
            throw new InvalidArgumentException('Cannot convert to a base of zero.');
        }

        $convertedInteger = $integer * $newBase / $base;

        if (null !== $precision) {
            $convertedInteger = round($convertedInteger, $precision);
        }

        if (true === $newBaseAsMax && $convertedInteger > $newBase) {
            $convertedInteger = $newBase;
        }

        return $convertedInteger;
    }
}

/* EOF */