<?php

namespace Bear\BBS;

use Bear\BBS\Interceptors\SimpleDebugger;
use LumengPHP\Console\ConsoleAppSettingInterface;
use LumengPHP\Http\Events\HttpResultCreated;
use LumengPHP\Http\HttpAppSettingInterface;
use Redis;
use Bear\BBS\Events\UserLogined;
use Bear\BBS\Events\HelloWorldVisited;

/**
 * 应用配置
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class AppSetting implements HttpAppSettingInterface, ConsoleAppSettingInterface {

    /**
     * @var string 应用根目录
     */
    private $rootDir;

    /**
     * @var string 运行时目录
     */
    private $runtimeDir;

    public function __construct($rootDir, $runtimeDir) {
        $this->rootDir = $rootDir;
        $this->runtimeDir = $runtimeDir;
    }

    public function getServices() {
        return [
            'redisConn' => function($container) {
                $appContext = $container->get('appContext');
                $config = $appContext->getConfig('redis');
                $redis = new Redis();
                $redis->connect($config['host'], $config['port']);
                return $redis;
            },
            'defaultEventQueue' => [
                'class' => \LumengPHP\Components\Queue\RedisQueue::class,
                'constructor-args' => ['@redisConn', '/bear/bbs/eventQueues/defaultEventQueue'],
            ],
            'userEventQueue' => [
                'class' => \LumengPHP\Components\Queue\RedisQueue::class,
                'constructor-args' => ['@redisConn', '/bear/bbs/eventQueues/userEventQueue'],
            ],
        ];
    }

    public function getExtensions() {
        return [
            \LumengPHP\Extensions\DatabaseExtension::class,
        ];
    }

    public function getEvents() {
        return [
            HttpResultCreated::class => [
                \Bear\BBS\EventListeners\HttpResultCreatedListener::class,
            ],
            HelloWorldVisited::class => [
                \Bear\BBS\EventListeners\HelloWorldVisitedListener::class,
            ],
            UserLogined::class => [
                \Bear\BBS\EventListeners\UserLoginedLogger::class,
            ],
        ];
    }

    public function getRootDir() {
        return $this->rootDir;
    }

    public function getRuntimeDir() {
        return $this->runtimeDir;
    }

    public function getInterceptors() {
        return [
            SimpleDebugger::class => '*',
        ];
    }

    public function getRoutingConfig() {
        return [
            '/' => \Bear\BBS\Controllers\HelloWorld::class,
            '/helloWorld' => \Bear\BBS\Controllers\HelloWorld::class,
            '/user/login' => \Bear\BBS\Controllers\User\Login::class,
            '/user/greetUser' => \Bear\BBS\Controllers\User\GreetUser::class,
            '/user/showUser' => \Bear\BBS\Controllers\User\ShowUser::class,
        ];
    }

    public function getCmds() {
        return [
            'helloWorld' => \Bear\BBS\Commands\HelloWorld::class,
            'user:showUser' => \Bear\BBS\Commands\User\ShowUser::class,
        ];
    }

}
