<?php

namespace Bear\BBS\Commands\User;

use Bear\BBS\Models\UserModel;

/**
 * 显示用户信息
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class ShowUser {

    public function execute() {
        $userModel = new UserModel();
        $user = $userModel->where(['uid' => 1])->findOne();
        echo "用户信息：\n", json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}
