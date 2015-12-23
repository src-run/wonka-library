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

/**
 * Class SerializerJson.
 */
class SerializerJson extends AbstractSerializer
{
    /**
     * SerializerJson constructor.
     */
    public function __construct()
    {
        $this->serializationHandler = 'json_encode';
        $this->unSerializationHandler = 'json_decode';
    }
}

/* EOF */
