<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//首页展示
Route::any('/', 'Index/index');
//获取礼品信息接口
Route::any('gift/get', 'Gift/get');
//提交form表单接口
Route::any('member/add', 'Member/add');
//用户领取信息列表界面
Route::any('member/index', 'Member/index');
//用户领取信息列表接口
Route::any('member/get', 'Member/get');
//修改礼品数量界面（需要调用获取礼品信息接口）
Route::any('gift/index', 'Gift/index');
//修改礼品数量接口
Route::any('gift/edit', 'Gift/edit');