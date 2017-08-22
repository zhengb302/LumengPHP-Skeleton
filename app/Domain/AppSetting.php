<?php

namespace Domain;

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

    public function getServices() {
        return [];
    }

    public function getExtensions() {
        return [];
    }

    public function getInterceptors() {
        return [];
    }

    public function getControllerParentNamespace() {
        return 'Domain\Controllers';
    }

    public function getRootDir() {
        return $this->rootDir;
    }

    public function getCacheDir() {
        
    }

}
