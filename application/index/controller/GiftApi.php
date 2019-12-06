<?php
namespace app\index\controller;
use think\Controller;
use app\common\exception;
use app\common\exception\ApiException;
use app\index\model\Gift as GiftModel;
class GiftApi extends Controller{

//获取所有分类信息
	public static function getApi(){
		return GiftModel::get();
	}

//修改数量
	public static function editApi($gift_id,$number){
		return GiftModel::edit($gift_id,$number);
	}

}