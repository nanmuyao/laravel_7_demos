<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use App\Jobs\DemoJob;

class DemoJobTest extends TestCase
{
    public function test_demo_job_dispatched()
    {
        Queue::fake();
        DemoJob::dispatch();
        Queue::assertPushed(DemoJob::class);
    }
}
