<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function showJsonResult($code = 1, $msg = 'success', $responseData = [], $httpCode = 200) {

    if(empty($responseData)){
        $responseData = (object)$responseData;
    }
    $arr = array(
        'code' => $code,
        'msg' => $msg,
        'data' => $responseData
    );
    return json($arr, $httpCode);
    
}

/*
    检查手机号是否合法
*/
function checkMobile($username='') {
    if(checkEmpty($username)){
        return false;
    }
    if (!is_numeric($username)) {
        return false;
    }
    return preg_match('#^1[\d]{10}$#', $username) ? true : false;
}

//为空
function checkEmpty($param){
    if(empty($param)){
        return true;
    }
    return false;
}