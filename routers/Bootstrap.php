<?php
/**
 * Created by PhpStorm.
 * User: yuanconghao
 * Date: 2019/5/29
 * Time: 2:13 PM
 */
class Bootstrap {

    public static $controller = null;

    public static $action = null;

    public function run() {
        //初始化方法
        $this->_init();

        //注册加载方法
        $this->_autoload();

        //路由方法
        $this->_router();
    }

    /**
     * 初始化方法
     */
    public function _init() {
        define('DS', DIRECTORY_SEPARATOR);   // /
        define('BASE_PATH', getcwd() . DS);  //项目根目录绝对路径

        define('CONTROLLER_PATH', BASE_PATH . 'controllers' . DS);
        define('MODEL_PATH', BASE_PATH . 'models' . DS);
        define('VIEW_PATH', BASE_PATH . 'views' . DS);
        define('STATIC_PATH', BASE_PATH . 'static' . DS);
        define('LIB', BASE_PATH . 'library' . DS);
        define('CONF', BASE_PATH . 'conf' . DS);

    }

    /**
     * 路由方法
     */
    public function _router() {
        $controller = Common_Request::getController();
        $action = Common_Request::getAction();
        $controller_path = str_replace('_', '/', $controller);
        include CONTROLLER_PATH . $controller_path . '.php';
        $controller_arr = explode('_', $controller);
        foreach ($controller_arr as $k => $v) {
            $controller_arr[$k] = ucfirst($v);
        }
        $controller_class_name = 'Controller_' . implode($controller_arr, '_');
        $controller_class = new $controller_class_name;
        call_user_func(array($controller_class, $action . 'Action'));

    }

    /**
     * 自动加载类
     */
    public function _autoload() {
        spl_autoload_register(array(__CLASS__, '_load'));
    }

    /**
     * 加载
     * @param $class
     */
    public function _load($class) {
        $class = strtolower($class);
        $class = str_replace('_', '/', $class);
        include LIB . $class . '.php';
    }






}