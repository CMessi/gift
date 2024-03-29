<?php
namespace app\index\controller;
use think\Controller;
use app\common\exception;
use app\common\exception\ApiException;
use app\index\model\Member as MemberModel;
class MemberApi extends Controller{

//获取所有领取信息
	public static function getApi($page_id=0){
		return MemberModel::get($page_id);
	}

	//添加
	public static function addApi($username,$phone_number,$address,$gift_id,$get_type){
		$data = array();
		$data['username'] = $username;
		$data['phone_number'] = $phone_number;
		$data['address'] = $address;
		$data['gift_id'] = $gift_id;
		$data['get_type'] = $get_type;
		$data['create_time'] = date('Y-m-d H:i:s');
		return MemberModel::add($data);
	}

	//根据手机号查询记录
	public static function getPhoneApi($phone_number=''){
		return MemberModel::getPhone($phone_number);
	}

	//领取的总数
	public static function getCountApi(){
		return MemberModel::getCount();
	}

}