<?php

/*
 * 数据库配置
 */

return [
    //连接名称 => 连接配置
    'bbs' => [
        'class' => LumengPHP\Db\Connection\SimpleConnection::class,
        //数据库类型：mysql、pgsql、sqlsrv等
        'type' => 'mysql',
        //表前缀，如：bbs_
        'tablePrefix' => 'bbs_',
        //数据库字符集
        'charset' => 'utf8',
        //数据库配置
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', 3306),
        'dbName' => env('DB_NAME', 'bbs'),
        'username' => env('DB_USERNAME', 'bbs'),
        'password' => env('DB_PASSWORD', 'bbs'),
    ],
];
