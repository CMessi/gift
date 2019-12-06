<?php
namespace app\common\auth;


class Auth{

	/**
	 * 设置登录的token
	 */
	public static function setToken($token_key='', $member_id=0, $account_type=1) {

		$str = time() . $member_id . '##!@@#' . $account_type;

		return Aes::encrypt($str,$token_key,'ENCODE');

	}

	//验证token
	public static function checkToken($token='', $token_key='') {

		return Aes::encrypt($token,$token_key,'DECODE');

	}


}