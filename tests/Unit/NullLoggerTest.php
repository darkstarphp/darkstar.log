<?php

namespace DarkStar\Tests\Unit\Logger;

use DarkStar\Log\LogLevel;
use DarkStar\Log\NullLogger;
use PHPUnit\Framework\TestCase;

class NullLoggerTest extends TestCase
{
    public function testLogsAtAllLevels()
    {
        $logger = new NullLogger;
        $levels = $this->provideLevelsAndMessages();
        $result = '';
        try {
            foreach ($levels as $level => $message) {
                $logger->log($level, $message);
            }
        } catch (\Exception $e) {
            $result .= 'fail';
        }
        $this->assertEmpty($result);
    }

    public function provideLevelsAndMessages(): array
    {
        return [
            LogLevel::EMERGENCY => '',
            LogLevel::ALERT => '',
            LogLevel::CRITICAL => '',
            LogLevel::ERROR => '',
            LogLevel::WARNING => '',
            LogLevel::NOTICE => '',
            LogLevel::INFO => '',
            LogLevel::DEBUG => '',
        ];
    }
}
