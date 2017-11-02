<?php

namespace Bear\BBS\Events;

/**
 * 用户(已)登录事件
 *
 * @queued(userEventQueue)
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class UserLogined {

    /**
     * @var string 
     */
    private $username;

    /**
     * @var int 
     */
    private $loginTime;

    public function __construct($username) {
        $this->username = $username;
        $this->loginTime = time();
    }

    public function getUsername() {
        return $this->username;
    }

    public function getLoginTime() {
        return $this->loginTime;
    }

}
