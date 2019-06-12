<?php
/**
 * Created by PhpStorm.
 * User: yuanconghao
 * Date: 2019/5/29
 * Time: 2:59 PM
 */
class Common_Request {

    static $controller = null;

    static $action = null;


    /**
     * 获取controller
     * @return null|string
     */
    public static function getController() {
        if (self::$controller !== null) {
            return self::$controller;
        }
        $uri = $_SERVER['PATH_INFO'];
        $uri_arr = explode('/', $uri);
        if (!isset($uri_arr[1])) {
            $uri_arr[1] = 'index';
        }
        self::$controller = strtolower($uri_arr[1]);
        return self::$controller;
    }


    /**
     * 获取action
     * @return null|string
     */
    public static function getAction() {
        if (self::$action !== null) {
            return self::$action;
        }
        $uri = $_SERVER['PATH_INFO'];
        $uri_arr = explode('/', $uri);
        if (!isset($uri_arr[2])) {
            $uri_arr[2] = 'index';
        }
        self::$action = strtolower($uri_arr[2]);
        return self::$action;
    }


    /**
     * getRequest
     * @param string $name
     * @return array|null
     */
    public static function getRequest($name = '') {
        $params = array_merge($_GET, $_POST);
        if ($name == '') {
            return $params;
        }
        if (isset($params[$name])) {
            return $params[$name];
        }else {
            return null;
        }
    }



}