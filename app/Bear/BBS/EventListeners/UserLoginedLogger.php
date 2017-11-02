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
     */
    private $appContext;

    /**
     * @var UserLogined 
     * @currentEvent
     */
    private $userLoginedEvent;

    public function execute() {
        
    }

}
