<?php
namespace app\components\pic2sdk\utils;

class EncodeUtils {

   
    public static function encodeWithURLSafeBase64($arg)
    {
        if ($arg === null || empty($arg)) {
            return null;
        }
        $result = preg_replace(array("/\r/", "/\n/"), "", rtrim(base64_encode($arg), '=' )); 
        return $result;
    }  

}
