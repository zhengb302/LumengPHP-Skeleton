<?php

namespace Bear\BBS\Controllers;

/**
 * HelloWorld for HTTP
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorld {

    public function execute() {
        return success('Hello world!');
    }

}
