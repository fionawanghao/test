<?php
/*********************************************************************************
 *  框架入口文件，所有脚本都是从这个文件开始执行，主要是一些全局设置。 *
 * ********************************************************************************/
	header("Content-Type:text/html;charset=utf-8");  //设置系统的输出字符为utf-8
	date_default_timezone_set("PRC");    		 //设置时区（中国）
	//PHP程序所有需要的路径，都使用相对路径
	define("SIMPLEPHP_PATH", rtrim(SIMPLEPHP, '/').'/');     //框架的路径
	define("APP_PATH", rtrim(APP,'/').'/');            //用户项目的应用路径
	define("PROJECT_PATH", dirname(SIMPLEPHP_PATH).'/');  //项目的根路径，也就是框架所在的目录
	
	include_once SIMPLEPHP_PATH .'/SimpleUrl.php';
	include_once SIMPLEPHP_PATH .'/SimpleView.php';
	include_once SIMPLEPHP_PATH .'/SimpleController.php';
	
	SimpleView::setTemplateDir(APP_PATH .'views');
	
	
	$m = isset($_GET['m']) ? $_GET['m'] : '';
	$a = isset($_GET['a']) ? $_GET['a'] : '';
	SimpleController::controller($m,$a);
	
	