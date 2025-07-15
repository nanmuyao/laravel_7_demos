<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Log;
use Tests\TestCase;
use App\Jobs\DemoJob;

class DemoJobUnitTest extends TestCase
{
    public function test_handle_logs_message()
    {
        Log::info("message from ExampleJob 111111111");

        // Log::shouldReceive('info')
        //     ->once()
        //     ->with('message from ExampleJob');

        $job = new DemoJob();
        $job->handle();
    }
}
