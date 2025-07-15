<?php

echo "正在测试Redis连接...\n\n";

// 测试Redis连接
$host = 'redis';
$port = 6379;
$timeout = 5;

echo "尝试连接到 Redis: {$host}:{$port}\n";

$socket = @fsockopen($host, $port, $errno, $errstr, $timeout);

if ($socket) {
    echo "✅ TCP连接成功建立!\n";
    
    // 发送PING命令到Redis
    fwrite($socket, "PING\r\n");
    $response = fread($socket, 1024);
    
    echo "发送PING命令，收到响应: " . trim($response) . "\n";
    
    // 设置一个键值对
    fwrite($socket, "SET test_key \"Hello Redis\"\r\n");
    $setResponse = fread($socket, 1024);
    echo "SET命令响应: " . trim($setResponse) . "\n";
    
    // 获取键值
    fwrite($socket, "GET test_key\r\n");
    $getResponse = fread($socket, 1024);
    echo "GET命令响应: " . trim($getResponse) . "\n";
    
    fclose($socket);
    echo "\n🎉 Redis连接测试成功!\n";
} else {
    echo "❌ 无法连接到Redis: {$errstr} (错误代码: {$errno})\n";
    
    // 尝试检查常见问题
    echo "\n调试信息:\n";
    echo "1. 检查Redis服务是否在运行\n";
    echo "2. 检查网络连接\n";
    echo "3. 检查防火墙设置\n";
    echo "4. 检查Docker容器是否启动\n";
}
