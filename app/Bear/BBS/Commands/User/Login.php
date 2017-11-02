<?php

namespace Bear\BBS\Commands\User;

use Bear\BBS\Events\UserLogined;
use LumengPHP\Console\InputInterface;
use LumengPHP\Kernel\Event\EventManagerInterface;

/**
 * 用户登录
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class Login {

    /**
     * @var InputInterface 
     * @service
     */
    private $input;

    /**
     * @var EventManagerInterface 
     * @service
     */
    private $eventManager;

    public function execute() {
        //登录逻辑。。。
        $username = trim($this->input->getArg(1));
        if (!$username) {
            _throw('用户名不能为空！');
        }

        //登录完成，触发事件
        $this->eventManager->trigger(new UserLogined($username));

        echo "登录成功！\n";
    }

}
