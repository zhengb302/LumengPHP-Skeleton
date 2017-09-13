<?php

namespace Bear\BBS\Commands\User;

use Bear\BBS\Models\UserModel;
use Exception;
use LumengPHP\Console\InputInterface;

/**
 * 显示用户信息
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class ShowUser {

    /**
     * @var InputInterface 
     * @service
     */
    private $input;

    public function execute() {
        $uid = (int) $this->input->getArg(1);
        if (!$uid) {
            throw new Exception('“uid”参数不能为空！');
        }

        $userModel = new UserModel();
        $user = $userModel->where(['uid' => $uid])->findOne();
        if (!$user) {
            echo "用户不存在~\n";
            return;
        }

        echo "用户信息：\n", json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

}
