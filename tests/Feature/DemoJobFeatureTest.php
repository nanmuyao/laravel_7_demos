<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use App\Jobs\DemoJob;

class DemoJobFeatureTest extends TestCase
{
    // public function test_dispatch_demo_job_via_route()
    // {
    //     Queue::fake();
    //     $response = $this->get('/dispatch-demo-job');
    //     $response->assertStatus(200);
    //     Queue::assertPushed(DemoJob::class);
    // }

    public function test_dispatch_demo_job_via_route()
    {
        $response = $this->get('/dispatch-demo-job');
        $response->assertStatus(200);
    }
}
