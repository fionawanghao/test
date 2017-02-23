<?php 
final class SimpleView
{

	private static $_tplDir = '';
	private static $_data = array();
	
	public static function set($key, $val = null) {
		if ($val) {
			self::$_data[$key] = $val;
		} else {
			if (is_array($key)) {
				foreach($key as $k => $v) {
					self::set($k, $v);
				}
			}
		}
	}

	public static function get($key) {
	
		if (isset(self::$_data[$key]))
			return self::$_data[$key];
		
	}
	
	public static function setTemplateDir($dir) {
		self::$_tplDir = $dir;
	}
	
	public static function display($tpl) {
		if (self::$_tplDir) $tpl = self::$_tplDir . '/' . $tpl;
		require $tpl;
	}
	
	public static function fetch($tpl) {
		ob_start();
		if (self::$_tplDir) $tpl = self::$_tplDir . '/' . $tpl;
		require $tpl;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
	
}
