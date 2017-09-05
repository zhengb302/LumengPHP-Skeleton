<?php

namespace Bear\BBS\Controllers\User;

use Exception;

/**
 * greet someone
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class GreetUser {

    /**
     * @var string 用户名
     * @get(name)
     */
    private $username;

    /**
     * @var string 问候消息
     * @get
     */
    private $msg;

    public function init() {
        if (!$this->username) {
            throw new Exception('用户名不能为空！');
        }
    }

    public function execute() {
        return success("Hello {$this->username}!{$this->msg}");
    }

}
