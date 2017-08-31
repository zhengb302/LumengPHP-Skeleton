<?php

namespace Foo\Bar\Extensions;

use LumengPHP\Db\ConnectionManager;
use LumengPHP\Kernel\Extension\AbstractExtension;

/**
 * 数据库扩展
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class DatabaseExtension extends AbstractExtension {

    public function load() {
        $container = $this->appContext->getServiceContainer();

        //初始化数据库配置，创建连接管理器，并把连接管理器注册成名称为“dbConnManager”的服务
        $connectionConfigs = $this->appContext->getConfig('database');
        $connManager = ConnectionManager::create($connectionConfigs);
        $container->register('dbConnManager', $connManager);

        //把默认连接注册成名称为“dbConn”的服务
        $container->register('dbConn', function($container) {
            /* @var $connManager ConnectionManager */
            $connManager = $container->get('dbConnManager');
            return $connManager->getDefaultConnection();
        });
    }

}
