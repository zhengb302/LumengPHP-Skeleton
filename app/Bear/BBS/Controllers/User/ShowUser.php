<?php

namespace Bear\BBS\Controllers\User;

use Exception;
use Bear\BBS\Models\UserModel;

/**
 * show user
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class ShowUser {

    /**
     * @var int 用户ID
     * @get
     */
    private $uid;

    public function init() {
        if (!$this->uid) {
            throw new Exception('“uid”参数不能为空！');
        }
    }

    public function execute() {
        $userModel = new UserModel();
        $user = $userModel->where(['uid' => $this->uid])->findOne();
        if (!$user) {
            throw new Exception('用户不存在！');
        }

        return $user;
    }

}
