<?php

namespace app\common\exception;

use think\Exception;

class ApiException extends Exception {

    public $message = '';
    public $httpCode = 200;
    public $code = 0;
    /**
     * @param string $message
     * @param int $httpCode
     * @param int $code
     */
    /*public function __construct($code = 0, $message = '', $httpCode = 200 ) {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->code = $code;
    }*/
    public function __construct($message = '', $httpCode = 200, $code = 0) {
        $this->httpCode = $httpCode;
        $this->message = $message;
        $this->code = $code;
    }
}