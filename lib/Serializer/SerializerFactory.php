<?php

/*
 * This file is part of the Wonka Bundle.
 *
 * (c) Scribe Inc.     <oss@src.run>
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\Wonka\Serializer;

use Scribe\Wonka\Utility\Extension;
use Scribe\Wonka\Utility\StaticClass\StaticClassTrait;

/**
 * Class SerializerFactory.
 */
class SerializerFactory implements SerializerFactoryInterface
{
    use StaticClassTrait;

    /**
     * @var string
     */
    const SERIALIZER_AUTO = 'auto';

    /**
     * @var string
     */
    const SERIALIZER_NATIVE = 'native';

    /**
     * @var string
     */
    const SERIALIZER_IGBINARY = 'igbinary';

    /**
     * @var string
     */
    const SERIALIZER_JSON = 'json';

    /**
     * @param string $type
     *
     * @return SerializerInterface
     */
    public static function create($type = self::SERIALIZER_AUTO)
    {
        if ($type === self::SERIALIZER_AUTO && Extension::hasIgbinary()) {
            $type = self::SERIALIZER_IGBINARY;
        }

        return self::createRequestedType($type);
    }

    /**
     * @param string $type
     *
     * @return SerializerInterface
     */
    protected static function createRequestedType($type)
    {
        switch ($type) {
            case self::SERIALIZER_IGBINARY:
                return SerializerIgbinary::create();

            case self::SERIALIZER_JSON:
                return SerializerJson::create();
        }

        return SerializerNative::create();
    }
}

/* EOF */
