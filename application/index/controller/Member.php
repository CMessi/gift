<?php
namespace app\index\controller;
use think\Controller;
use app\common\exception;
use app\common\exception\ApiException;
use think\facade\Request;
class Member{

	//用户领取信息列表界面
    public function index(){
        return view('Member/index');
    }

    //提交form表单接口
    public function add(){
        $username = Request::param('username','');
        $phone_number = Request::param('phone_number','');
        $address = Request::param('address','');
        $gift_id = Request::param('gift_id','','intval');
        $get_type = Request::param('get_type','');
        if(!checkMobile($phone_number)){
            return showJsonResult(0,'手机号格式错误');
        }
        if(!$username || !$address || !$gift_id || !$get_type){
            return showJsonResult(0,'参数为空');
        }
        //查询手否有重复的手机号
        if(MemberApi::getPhoneApi($phone_number)){
            return showJsonResult(0,'该手机号已领取');
        }
        if(MemberApi::addApi($username,$phone_number,$address,$gift_id,$get_type)){
            //礼品数量减1
            GiftApi::reduceGiftApi($gift_id);
            return showJsonResult(1,'success');
        }
        return showJsonResult(0,'领取失败');
    }

    //用户领取信息列表接口
    public function get(){
        $page_id = Request::param('page_id','0', 'intval');
        $list = MemberApi::getApi($page_id);
        return showJsonResult(1, 'success', $list);
    }

}
