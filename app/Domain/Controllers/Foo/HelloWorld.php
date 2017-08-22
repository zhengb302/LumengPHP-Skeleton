<?php

namespace Domain\Controllers\Foo;

use LumengPHP\Http\Result\Success;

/**
 * HelloWorld
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorld {

    public function execute() {
        return new Success('hello world!');
    }

}
