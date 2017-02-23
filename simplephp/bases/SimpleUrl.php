<?php
class SimpleUrl{
	static function parseUrl(){
		if(isset($_GET["m"])){	
			$_GET["m"]= (!empty($_GET['m']) ? $_GET['m']: '');    //默认是index模块
			$_GET["a"]= (!empty($_GET['a']) ? $_GET['a'] : '');   //默认是index动作
		}else{
      			 //获取 pathinfo
			$pathinfo = explode('/', trim($_SERVER['PATH_INFO'], "/"));
			
       			// 获取 control
       			$_GET['m'] = (!empty($pathinfo[0]) ? $pathinfo[0]: '');

       			array_shift($pathinfo); //将数组开头的单元移出数组 
      				
			    // 获取 action
       			$_GET['a'] = (!empty($pathinfo[0]) ? $pathinfo[0] : '' );
			
		}
	}
}
