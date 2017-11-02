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
     * @var int 
     */
    private $uid;

    /**
     * @var int 
     */
    private $loginTime;

    public function __construct($uid) {
        $this->uid = $uid;
        $this->loginTime = time();
    }

    public function getUid() {
        return $this->uid;
    }

    public function getLoginTime() {
        return $this->loginTime;
    }

}
