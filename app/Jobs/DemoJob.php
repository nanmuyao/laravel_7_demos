<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class DemoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * 任务失败时的处理逻辑。
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable $exception)
    {
        Log::error('DemoJob 执行失败: ' . $exception->getMessage(), [
            'exception' => $exception,
        ]);
    }
    /**
     * 最大尝试次数
     *
     * @var int
     */
    public $tries = 3;

    /**
     * 任务失败前的最大秒数（可选）
     *
     * @var int
     */
    public $timeout = 60;

    /**
     * 任务重试间隔（秒）
     *
     * @return array
     */
    public function backoff()
    {
        return [10, 30, 60];
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        Log::info("message from ExampleJob run");
    }
}
