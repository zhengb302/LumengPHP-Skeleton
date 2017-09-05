<?php

namespace Bear\BBS;

use LumengPHP\Http\HttpAppSettingInterface;

/**
 * 应用配置
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class AppSetting implements HttpAppSettingInterface {

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
        return [];
    }

    public function getExtensions() {
        return [
            \LumengPHP\Extensions\DatabaseExtension::class,
        ];
    }

    public function getRootDir() {
        return $this->rootDir;
    }

    public function getRuntimeDir() {
        return $this->runtimeDir;
    }

    public function getInterceptors() {
        return [];
    }

    public function getRoutingConfig() {
        return [
            '/home' => \Bear\BBS\Controllers\Home::class,
            '/user/greetUser' => \Bear\BBS\Controllers\User\GreetUser::class,
            '/user/showUser' => \Bear\BBS\Controllers\User\ShowUser::class,
        ];
    }

}
