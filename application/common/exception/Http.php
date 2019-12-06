<?php
namespace app\common\exception;

use Exception;
use think\exception\Handle;
use think\exception\HttpException;
use think\exception\ValidateException;

class Http extends Handle
{
    public function render(Exception $e)
    {

        // 其他错误交给系统处理
        if(config('app_debug') == true) {
            return parent::render($e);
        }

        // 参数验证错误
        if ($e instanceof ValidateException) {
            return json($e->getError(), 422);
            return  showJsonResult(100, $e->getError());
        }

        // 请求异常
        if ($e instanceof HttpException && request()->isAjax()) {
            return response($e->getMessage(), $e->getStatusCode());
            return  showJsonResult(100, $e->getMessage());
        }

        if(isset($e->code)){

            $code = $e->code;
        }else{
            $code = 0;
        }
        if(strpos($e->getMessage(),'not exists') !== false){
            header('location:'.url('/404'));die;
        }else{
            return  showJsonResult($code, $e->getMessage());
        }
    }

}