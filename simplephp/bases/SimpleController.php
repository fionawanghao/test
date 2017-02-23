<?php 

class SimpleController 
{
	static function touch($fileName, $str){
		if(!file_exists($fileName)){
			file_put_contents($fileName, $str);
		}
	}
	
	static function controller($m,$a){
		if(!file_exists(SIMPLEPHP_PATH .'welcom.php')){
			$str= <<<st

	<b><font color="#FF0000">欢迎使用SimplePHP，请按照下面的方式创建目录开始你的项目</font></b><br>
	|--controllers<br>
	|  |--IndexController.php(在每个controller文件里requireSIMPLEPHP_PATH ./SimpleView.php 就可以渲染模板了)<br>
	|--views<br>
	|  |--index.html<br>
	|--index.php<br>

st;

			self::touch(SIMPLEPHP_PATH .'welcom.php',$str);
			$file = file_get_contents(SIMPLEPHP_PATH .'welcom.php');
			echo $file;
			exit;
		}
		             
		$classname = "index";
		$actionname = "indexAction";
		if(!empty($m)){
			$classname = strtolower($m);
		}
		if(!empty($a)){
			$actionname = strtolower($a).'Action';
		}
		
		$controllername = ucfirst($classname).'Controller';
		$controllerfile = APP_PATH .'controllers/'.$controllername.'.php';
		
		if(file_exists($controllerfile)){
			require $controllerfile;
		}else{
			echo '找不到文件'.$controllerfile;
			exit;
		}
		
		if(class_exists($controllername)){
			$controller = new $controllername();
		}else{
			echo 'class'.$controllername.'在'.$controllerfile.'中未定义';
			exit;
		}
		
		if(method_exists($controller,$actionname)){
				$result = $controller->$actionname();
			
		}else{
			echo $actionname.'方法在'.$controllerfile.'文件的'.$controllername.'类中未定义';
			exit;
		}
		
	}
			
}