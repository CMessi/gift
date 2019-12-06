<?php
namespace app\common\auth;

/**
 * aes 加密 解密类库
 * @by singwa
 * Class Aes
 * @package app\common\auth
 */
class Aes {

/**
 * 加解密函数
 * @param    string     $string    [description]
 * @param    string     $key       [description]
 * @param    string     $operation [description]
 * @return   [type]                [description]
 */
    public static function encrypt($string = '', $key='', $operation = 'DECODE'){ 
        $key = md5($key); 
        $key_length = strlen($key);
        $data = base64_decode(str_replace(array('-','_'),array('+','/'),$string));
        $string = $operation == 'DECODE'?$data:substr(md5($string.$key),0,8).$string;
        $string_length = strlen($string); 
        $rndkey = $box = array(); 
        $result = ''; 
        for($i=0;$i<=255;$i++){ 
               $rndkey[$i] = ord($key[$i%$key_length]); 
            $box[$i] = $i;
        } 
        for($j=$i=0;$i<256;$i++){ 
            $j = ($j+$box[$i]+$rndkey[$i])%256; 
            $tmp = $box[$i]; 
            $box[$i] = $box[$j]; 
            $box[$j] = $tmp; 
        } 
        for($a=$j=$i=0;$i<$string_length;$i++){ 
            $a = ($a+1)%256; 
            $j = ($j+$box[$a])%256; 
            $tmp = $box[$a]; 
            $box[$a] = $box[$j]; 
            $box[$j] = $tmp; 
            $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256])); 
        } 
        if($operation=='DECODE'){ 
            if(substr($result,0,8)==substr(md5(substr($result,8).$key),0,8)){ 
                return substr($result,8); 
            }else{ 
                return''; 
            } 
        }else{ 
            $data = str_replace('=','',base64_encode($result));
            return str_replace(array('+','/','='),array('-','_',''),$data);
        } 
    }



    /**
     * 加密
     * @param String str 加密的字符串
     * @param String key   解密的key
     * @return HexString
     */
    public static function encrypt_base64($str = '', $key='') {

    	$data = base64_encode($str . $key);

        return $data;

    }

    /**
     * 解密
     * @param String str 解密的字符串
     * @param String key   解密的key
     * @return String
     */
    public static function decrypt($str = '', $key='') {

        $data = base64_decode($str);

        return $data;

    }

    /**
     * 验证签名
     * @param array $data
     * @param string $key
     * @return string
     */
    public function getVerifySign($data, $key){

        $String = $this->formatParameters($data, false);
        //签名步骤二：在string后加入KEY
        $String = $String . "&key=" . $key;
        //签名步骤三：MD5加密
        $String = md5($String);
        //签名步骤四：所有字符转为大写
        $result = strtoupper($String);
        return $result;
    }
    
    public function formatParameters($paraMap, $urlencode){

        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if($k=="sign"){
                continue;
            }
            if ($urlencode) {
                $v = urlencode($v);
            }
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar;
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff) - 1);
        }
        return $reqPar;
    }
    
    /**
     * 得到签名
     * @param object $obj
     * @param string $api_key
     * @return string
     */
    public function getSign($obj, $api_key){

        foreach ($obj as $k => $v){
            $Parameters[strtolower($k)] = $v;
        }
        //签名步骤一：按字典序排序参数
        ksort($Parameters);
        $String = $this->formatBizQueryParaMap($Parameters, false);
        //签名步骤二：在string后加入KEY
        $String = $String."&key=".$api_key;
        //签名步骤三：MD5加密
        $result = strtoupper(md5($String));
        return $result;
    }

    /**
     * 将数组转成uri字符串
     * @param array $paraMap
     * @param bool $urlencode
     * @return string
     */
    public function formatBizQueryParaMap($paraMap, $urlencode){

        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v){
            if($urlencode){
               $v = urlencode($v);
            }
            $buff .= strtolower($k) . "=" . $v . "&";
        }
        $reqPar;
        if (strlen($buff) > 0){
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }




}