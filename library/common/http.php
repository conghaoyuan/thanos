<?php

/**
 * http请求
 * Class Common_Http
 */
class Common_Http {

    /**
     * get请求
     * 带header
     * @param $header
     * @param $data
     * @param $url
     * @return int|mixed
     */
    public static function curl_get($header,$data, $url) {
        $ch = curl_init();
        $res= curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        $result = curl_exec ($ch);
        curl_close($ch);
        if ($result == NULL) {
            return 0;
        }
        return $result;
    }

    /**
     * post请求
     * 带header
     * @param $header
     * @param $data
     * @param $url
     * @return int|mixed
     */
    public static function curl_post($header, $data, $url) {
        $ch = curl_init();
        $res= curl_setopt ($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt ($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
        $result = curl_exec ($ch);
        curl_close($ch);
        if ($result == NULL) {
            return 0;
        }
        return $result;
    }
}