<?php
/**
 * Created by PhpStorm.
 * User: yuanconghao
 * Date: 2019/5/29
 * Time: 6:52 PM
 */
abstract class Controller {


    protected $requestParams;

    private $_requestStartTime = 0;

    /**
     * construct
     * Controller constructor.
     */
    public function __construct() {
        $this->execute();
    }


    /**
     * execute
     */
    public function execute() {
        try{
            $this->_requestStartTime = microtime(true);
            $this->requestParams = Common_Request::getRequest();
        }catch (Exception $e) {

        }
    }

    /**
     * 模板展示
     * @param array $data
     * @param string $tpl
     */
    public function display($data = array(), $tpl = '') {
        if($tpl) {
            $template = VIEW_PATH . $tpl. '.phtml';
        }else {
            $controller = Common_Request::getController();
            $action = Common_Request::getAction();
            $controller = str_replace('_', '/', $controller);
            $template = VIEW_PATH . $controller. '/'. $action. '.phtml';
        }
        extract($data, EXTR_OVERWRITE);
        include $template;
    }


    /**
     * 输出成功信息
     * @param string $result
     */
    public function result($result, $code = null, $msg = null) {
        $ret = array(
            'errno' => 0,
            'errmsg' => '',
            '_used' => sprintf('%.3f',(microtime(true)-$this->_requestStartTime)*1000),
        );
        if (is_array($result)) {
            $ret['data'] = $result;
        }
        $code && $ret['errno'] = $code;
        $msg && $ret['errmsg'] = $msg;
        $jsonStr = json_encode($ret);
        header('Content-Type: application/json;charset=utf-8');
        echo $jsonStr;
    }

    /**
     * 跳转
     * @param $url
     * @param int $time
     * @param string $msg
     */
    public function redirect($url, $time = 0, $msg = '') {
        //多行URL地址支持
        $url = str_replace(array("\n", "\r"), '', $url);
        if (empty($msg))
            $msg    = "系统将在{$time}秒之后自动跳转到{$url}！";

        if (!headers_sent()) {
            // redirect
            if (0 === $time) {
                header('Location: ' . $url);
            } else {
                header("Content-type:text/html;charset=utf-8");
                header("refresh:{$time};url={$url}");
                echo($msg);
            }
            exit();
        } else {
            $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
            if ($time != 0)
                $str .= $msg;
            exit($str);
        }
    }



}