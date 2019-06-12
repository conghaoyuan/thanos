<?php
/**
 * Created by PhpStorm.
 * User: yuanconghao
 * Date: 2019/5/29
 * Time: 4:15 PM
 */
class Controller_Index extends Controller {

    public function indexAction() {

        $this->display();
    }


    public function thanosAction() {
        $this->result(array("hello thanos"));
    }
}
