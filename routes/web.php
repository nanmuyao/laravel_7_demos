
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Http\Controllers\DemoJobController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-redis', function () {
    try {
        // 测试Redis连接
        Redis::set('test_key', 'Hello Redis!');
        $value = Redis::get('test_key');
        
        // 测试一些基本的Redis操作
        Redis::incr('counter');
        $counter = Redis::get('counter');
        
        return response()->json([
            'status' => 'success',
            'message' => 'Redis连接成功',
            'test_value' => $value,
            'counter' => $counter,
            'redis_info' => [
                'connection' => 'successful',
                'server' => config('database.redis.default.host'),
                'port' => config('database.redis.default.port')
            ]
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Redis连接失败: ' . $e->getMessage()
        ], 500);
    }
});

Route::get('/dispatch-demo-job', [DemoJobController::class, 'dispatchDemoJob']);