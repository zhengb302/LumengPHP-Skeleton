<?php

namespace Bear\BBS;

use Bear\BBS\Interceptors\SimpleDebugger;
use LumengPHP\Console\ConsoleAppSettingInterface;
use LumengPHP\Http\Events\HttpResultCreated;
use LumengPHP\Http\HttpAppSettingInterface;
use Redis;
use Bear\BBS\Events\UserLogined;

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
                $redis->connecte($config['host'], $config['port']);
                return $redis;
            },
            'userEventQueue' => [
                'class' => \LumengPHP\Components\Queue\BlockingRedisQueue::class,
                'constructor-args' => ['@redisConn', '/bear/bbs/eventQueues/userEventQueue'],
            ],
        ];
    }

    public function getExtensions() {
        return [
            \LumengPHP\Extensions\DatabaseExtension::class,
        ];
    }

    public function getEventConfig() {
        return [
            HttpResultCreated::class => [
                \Bear\BBS\EventListeners\HttpResultCreatedListener::class,
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

    public function getCmdMapping() {
        return [
            'helloWorld' => \Bear\BBS\Commands\HelloWorld::class,
            'user:showUser' => \Bear\BBS\Commands\User\ShowUser::class,
        ];
    }

}
