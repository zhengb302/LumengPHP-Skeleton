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
    //事件监听配置
    'eventListen' => [
        //是否禁用多进程模式
        'disableMultiWorkers' => (boolean) env('EVENT_LISTEN_DISABLE_MULTI_WORKERS', false),
        //每次处理的最大事件数量
        'maxEventNum' => env('EVENT_LISTEN_MAX_EVENT_NUM', 1000),
    ],
];

