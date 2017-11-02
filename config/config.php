<?php

/*
 * 应用配置
 */

return [
    //数据库配置
    'database' => require(__DIR__ . '/database.php'),
    //Redis配置
    'redis' => [
        'host' => env('REDIS_HOST', '127.0.0.1'),
        'port' => env('REDIS_PORT', 6379),
    ],
    //事件监听守护进程的配置
    'eventListend' => [
        //运行用户的用户名
        'user' => env('EVENT_LISTEND_USER', 'nobody'),
        //运行用户的组名
        'group' => env('EVENT_LISTEND_GROUP', 'nobody'),
    ],
];

