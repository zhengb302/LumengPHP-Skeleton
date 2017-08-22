<?php

namespace Domain\Controllers\Foo;

use LumengPHP\Http\Result\Success;

/**
 * HelloWorld
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorld {

    /**
     * @var string 
     * @get
     */
    private $msg;

    public function init() {
        if (!$this->msg) {
            $this->msg = 'world';
        }
    }

    public function execute() {
        return new Success("hello {$this->msg}!");
    }

}
