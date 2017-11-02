<?php

namespace Bear\BBS\Controllers\User;

use Bear\BBS\Events\UserLogined;
use LumengPHP\Kernel\Event\EventManagerInterface;

/**
 * 用户登录
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class Login {

    /**
     * @var string 
     * @get
     */
    private $username;

    /**
     * @var EventManagerInterface 
     * @service
     */
    private $eventManager;

    public function execute() {
        //登录逻辑。。。
        if (!$this->username) {
            _throw('用户名不能为空！');
        }

        //登录完成，触发事件
        $this->eventManager->trigger(new UserLogined($this->username));

        return success('登录成功！');
    }

}
