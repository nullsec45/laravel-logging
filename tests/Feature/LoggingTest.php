<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoggingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogging(){
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Fajar Ganteng");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext(){
        Log::info("Hello Info", ["user" => "Fajar"]);

        self::assertTrue(true);
    }

    public function testWithContext(){
        Log::withContext(["user" => "Fajar"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
        Log::info("Hello Info");

        self::assertTrue(true);
    }

    public function testWithChannel(){
        $slackLogger=Log::channel("slack");
        $slackLogger->error("Hello World");

        Log::info("Hello Laravel");

        self::assertTrue(true);
    }

    public function testFileHandler(){
        $fileLogger=Log::channel("file");
        $fileLogger->info("Hello World");
        $fileLogger->warning("Hello World");
        $fileLogger->error("Hello World");
    
        self::assertTrue(true);
    }
}
