<?php

namespace app\index\model;

use think\Model;
use think\Db;

/**
 * 礼品模型
 */
class Gift extends Model{

    private static $stable = "gift";

    //获取
    public static function get(){
        return db(self::$stable)->select();
    }

    //修改数量
    public static function edit($gift_id,$number){
        if(db(self::$stable)->where("id=$gift_id")->setField('number', $number)){
            return true;
        }else{
            return false;
        }
    }


}