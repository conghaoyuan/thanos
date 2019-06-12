<?php
//入口文件, 单一入口
//载入核心核心启动类
include "routers/Bootstrap.php";

//实例化对象并调用方法
$bootstrap = new Bootstrap();
$bootstrap->run();


