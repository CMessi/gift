<?php
namespace app\index\controller;
use think\Controller;
use app\common\exception;
use app\common\exception\ApiException;
use think\facade\Request;
class Gift{

	//后台领取信息界面
    public function index(){
        return view('Gift/index');
    }

    //获取所有礼品接口
    public function get(){
        $list = GiftApi::getApi();
        return showJsonResult(1, 'success', $list);
    }

    //修改礼品数量接口
    public function edit(){
        $number = Request::param('number','','intval');
        $gift_id = Request::param('gift_id','','intval');
        if(!$number || !$gift_id){
        	return showJsonResult(0,'参数为空');
        }
        if(GiftApi::editApi($gift_id,$number)){
        	return showJsonResult(1,'success');
        }
        return showJsonResult(0,'fail');
    }

}
