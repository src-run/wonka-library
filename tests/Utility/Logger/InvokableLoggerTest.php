<?php

/*
 * This file is part of the `src-run/wonka-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 * (c) Scribe Inc      <scr@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Wonka\Tests\Utility\Logger;

use Monolog\Logger;
use Psr\Log\LoggerInterface;
use SR\Wonka\Utility\Logger\InvokableLogger;
use SR\Wonka\Utility\UnitTest\WonkaTestCase;

/**
 * Class LoggerInvokableTest.
 */
class LoggerInvokableTest extends WonkaTestCase
{
    /**
     * @return InvokableLogger
     */
    public function mockInvokable(LoggerInterface $logger, $levelDefault = null)
    {
        return $this
            ->getMockBuilder('SR\Wonka\Utility\Logger\InvokableLogger')
            ->setConstructorArgs([$logger, $levelDefault])
            ->setMethods(null)
            ->getMock();
    }

    /**
     * @return Logger
     */
    public function mockLogger()
    {
        return $this
            ->getMockBuilder('Monolog\Logger')
            ->setConstructorArgs(['phpunit'])
            ->setMethods(['log'])
            ->getMock();
    }

    public function testGetterAndSetterMethodsCallable()
    {
        $logger = $this->mockLogger();
        $logger->expects($this->atLeastOnce())->method('log');
        $invokable = $this->mockInvokable($logger);

        static::assertNotNull($invokable->getLogger());
        static::assertNotNull($invokable->getLevelDefault());
        static::assertSame(InvokableLogger::HARD_DEFAULT, $invokable->getLevelDefault());

        $invokable->setLevelDefault(InvokableLogger::ALERT);

        static::assertSame(InvokableLogger::ALERT, $invokable->getLevelDefault());

        $invokable('A message for the logger!');
    }
}

/* EOF */