<?php

namespace Bear\BBS\EventListeners;

use Bear\BBS\Events\UserLogined;
use LumengPHP\Kernel\AppContextInterface;

/**
 * 用户(已)登录事件日志记录程序
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class UserLoginedLogger {

    /**
     * @var AppContextInterface 
     * @service
     */
    private $appContext;

    /**
     * @var UserLogined 
     * @currentEvent
     */
    private $userLoginedEvent;

    public function execute() {
        $logFileDir = $this->appContext->getRuntimeDir() . '/log';
        if (!is_dir($logFileDir)) {
            mkdir($logFileDir, 0755, true);
        }

        $logFile = $logFileDir . '/user-logined.log';
        $msg = date('Y-m-d H:i:s', $this->userLoginedEvent->getLoginTime())
                . ' 用户 ' . $this->userLoginedEvent->getUsername() . " 登录了系统\n";
        file_put_contents($logFile, $msg, FILE_APPEND);
    }

}
