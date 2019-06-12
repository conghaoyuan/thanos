<?php 
class Common_Tpl {
    
    /**
     * 加载模块
     * @param  [type] $tpl  [description]
     * @param  array  $data [description]
     * @return [type]       [description]
     */
    static public function load($tpl, array $data = array()) {
        extract($data, EXTR_SKIP);
        $tpl_path = VIEW_PATH. $tpl. '.phtml';
        include $tpl_path;
    }
}