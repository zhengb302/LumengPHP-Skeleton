<?php

namespace Bear\BBS\EventListeners;

use Bear\BBS\Interceptors\SimpleDebugger;
use LumengPHP\Http\Events\HttpResultCreated;

/**
 * HttpResultCreated事件监听器
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class HttpResultCreatedListener {

    /**
     * @var HttpResultCreated
     * @currentEvent
     */
    private $event;

    /**
     * @var SimpleDebugger
     * @service 
     */
    private $simpleDebugger;

    public function execute() {
        $debugInfo = $this->simpleDebugger->getDebugInfo();

        $result = $this->event->getResult();
        $result->setMore([
            '__debugInfo' => $debugInfo,
        ]);
    }

}
