<?php

namespace app\common;
use \sdk\ip\IpSearch;

class Ip{
/**
 * 根据ip获取地址
 * @param    string     $ip [description]
 * @return   [type]         [description]
 */
	public static function getCityByIp($ip=''){

		$area_array = (new IpSearch())->get($ip);

		list(,,,$city) = explode('|', $area_array);
		
		return $city;

	}

}



