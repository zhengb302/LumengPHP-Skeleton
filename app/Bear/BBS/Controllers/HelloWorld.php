<?php

namespace Bear\BBS\Controllers;

use Bear\BBS\Events\HelloWorldVisited;

/**
 * HelloWorld for HTTP
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorld {

    public function execute() {
        event_manager()->trigger(new HelloWorldVisited());
        return success('Hello world!');
    }

}
