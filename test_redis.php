<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Redis;

// 加载Laravel应用
$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    echo "正在测试Redis连接...\n";
    
    // 测试基本连接
    Redis::set('test_connection', 'Laravel Redis Test');
    $value = Redis::get('test_connection');
    
    echo "✅ Redis连接成功!\n";
    echo "测试值: " . $value . "\n";
    
    // 测试计数器
    Redis::incr('test_counter');
    $counter = Redis::get('test_counter');
    echo "计数器值: " . $counter . "\n";
    
    // 测试列表操作
    Redis::lpush('test_list', 'item1', 'item2', 'item3');
    $listLength = Redis::llen('test_list');
    echo "列表长度: " . $listLength . "\n";
    
    // 显示Redis配置信息
    echo "\nRedis配置信息:\n";
    echo "主机: " . config('database.redis.default.host') . "\n";
    echo "端口: " . config('database.redis.default.port') . "\n";
    
    echo "\n🎉 Redis连接测试完成，所有功能正常!\n";
    
} catch (Exception $e) {
    echo "❌ Redis连接失败: " . $e->getMessage() . "\n";
    echo "错误详情: " . $e->getTraceAsString() . "\n";
}
