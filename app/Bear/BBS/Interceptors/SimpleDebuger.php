<?php

namespace Bear\BBS\Interceptors;

use LumengPHP\Http\InterceptorChainInterface;
use LumengPHP\Http\Routing\RouterInterface;
use LumengPHP\Db\Connection\ConnectionInterface;

/**
 * 简单的调试器
 *
 * @author zhengluming <luming.zheng@shandjj.com>
 */
class SimpleDebuger {

    /**
     * @var InterceptorChainInterface 拦截器链对象
     * @service(interceptorChain)
     */
    private $chain;

    /**
     * @var RouterInterface 
     * @service(httpRouter)
     */
    private $router;

    /**
     * @var ConnectionInterface 
     * @service(dbConn)
     */
    private $conn;

    public function execute() {
        //在控制器执行之前拦截
        $startTime = (int) (microtime(true) * 1000);

        //调用下一个拦截器，正常情况下，如果没有更多的拦截器，则调用控制器
        $return = $this->chain->invoke();

        //在控制器执行之后拦截
        $endTime = (int) (microtime(true) * 1000);

        //修改结果
        $debug = [
            'pathinfo' => $this->router->getPathInfo(),
            'timeConsumed' => ($endTime - $startTime) . 'ms',
            'lastSql' => $this->conn->getLastSql(),
        ];
        $return['__debug'] = $debug;

        //返回结果
        return $return;
    }

}
