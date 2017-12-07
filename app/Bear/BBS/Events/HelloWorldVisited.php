<?php

namespace Bear\BBS\Events;

/**
 * HelloWorld被访问事件
 *
 * @queued
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorldVisited {

    private $visitedTime;

    public function __construct() {
        $this->visitedTime = time();
    }

    public function getVisitedTime() {
        return $this->visitedTime;
    }

}
