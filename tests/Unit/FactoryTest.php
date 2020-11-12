<?php

namespace DarkStar\Tests\Unit\Logger;

use DarkStar\Logger\Factory;
use DarkStar\Logger\FileLogger;
use DarkStar\Logger\LoggerException;
use DarkStar\Logger\NullLogger;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    /** @var array $config */
    public $config;

    public function setUp(): void
    {
        $this->config = include TESTS_ROOT . '/Fixtures/config.php';
    }

    public function testGetFileLogger()
    {
        $factory = new Factory($this->config);
        $logger = $factory->makeFileLogger();
        $this->assertInstanceOf(FileLogger::class, $logger);
    }

    public function testGetFileLoggerWithInvalidConfig()
    {
        $factory = new Factory([]);
        $this->expectException(LoggerException::class);
        $factory->makeFileLogger();
    }

    public function testGetNullLogger()
    {
        $factory = new Factory($this->config);
        $logger = $factory->makeNullLogger();
        $this->assertInstanceOf(NullLogger::class, $logger);
    }
}