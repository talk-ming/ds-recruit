<?php

namespace Tests\Src;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Src\MyGreeter;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $this->greeter = $this->createMock(MyGreeter::class);
        $this->greeter->method('greeting')
            ->willReturnCallback(function ():string {
                $currentHour = date('H');
                // return different string depending on hour
                if ($currentHour >= 6 && $currentHour < 12) {
                    return "Good morning";
                } elseif ($currentHour >= 12 && $currentHour < 18) {
                    return "Good afternoon";
                } else {
                    return "Good evening";
                }
            });
    }

    /**
     * check $greeter is instanceof MyGreeter
     * @return void
     */
    public function testInit()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    /**
     * check the return value of greeting method
     * @return void
     */
    public function testGreeting()
    {
        $this->assertTrue(
            strlen($this->greeter->greeting()) > 0
        );
    }
}
