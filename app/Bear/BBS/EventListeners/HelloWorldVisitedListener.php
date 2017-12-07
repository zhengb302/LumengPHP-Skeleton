<?php

namespace Bear\BBS\EventListeners;

use Bear\BBS\Events\HelloWorldVisited;

/**
 * HelloWorldVisited事件的监听器
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HelloWorldVisitedListener {

    /**
     * @var HelloWorldVisited 
     * @currentEvent
     */
    private $event;

    public function execute() {
        echo 'HelloWorldVisited事件发生，发生时间：' . date('Y-m-d H:i:s', $this->event->getVisitedTime()), "\n";
    }

}
