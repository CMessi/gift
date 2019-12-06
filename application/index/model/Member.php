<?php

namespace app\index\model;

use think\Model;
use think\Db;

/**
 * 礼品模型
 */
class Member extends Model{

    private static $stable = "member";

    //获取
    public static function get(){
        return db(self::$stable)->select();
    }

    //添加
    public static function add($data=array()){
        if(db(self::$stable)->insert($data)){
            return true;
        }else{
            return false;
        }
    }


}