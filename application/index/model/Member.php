<?php

namespace app\index\model;

use think\Model;
use think\Db;

/**
 * 礼品模型
 */
class Member extends Model{

    private static $stable = "member";

    //获取->alias('a')

    public static function get($page_id=0){
        return db(self::$stable)->alias('m')->field('m.*,g.name')->join('t_gift g','m.gift_id = g.id')->order('m.id','desc')->limit($page_id*10,10)->select();
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