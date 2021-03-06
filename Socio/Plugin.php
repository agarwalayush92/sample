<?php
use Socio\Settings as Settings;

class Plugin
{	
	protected static $render_list = array();
	protected static $filters = array();
	protected static $contents = array();
	
	public static function register()
	{
		$dir    = __DIR__;
		$dir.='/plugins';
		$files = scandir($dir);
		foreach($files as $file)
		{
			if($file == "." or $file == "..") continue;
			if(is_dir($dir.'/'.$file))
			{
				if(file_exists($dir. '/' .$file. '/plugin.php'))
					include $dir."/$file/plugin.php";
				else
					die("can't find {$dir}/{$file}/plugin.php");
			}
		}	

	}
	
	public static function add_render($key , $value)
	{
		self::$render_list[$key] = $value;
		//print_r(self::$render_list[$key]);
		
	}
	
	public static function create_filter($key , $func)
	{
		self::$filters[$key] = array($func);
		
	}
	
	public static function add_filter($key , $func)
	{
		if(isset(self::$filters[$key])) 
		{
			array_push(self::$filters[$key], $func);
		}	
	}
	
	public static function render($func_name, $param = null)
	{	
		//die(print_r($func_name));
		$callable = self::$render_list[$func_name];
		if(isset($param))
			$callable($param);
		else
			$callable();
	}
	
	public static function get_filters($var)
	{
		//die(print_r(self::$filters[$var]));
		if(isset(self::$filters[$var]))
		{
			return self::$filters[$var];
			
		}
	}
	
	public static function render_views($view, $arr = array())
	{
		extract($arr);
		$temp = explode("/", $view);
		
		$plug_name = $temp[0];
		$view_name = $temp[1];
		
		$path1 = __DIR__."/views/".Settings::get("theme"). "/plugins/$plug_name/$view_name";
		$path2 = __DIR__."/plugins/$plug_name/views/$view_name";
		
		if(file_exists($path1))
			$full_path_to_view = $path1;
		else
			$full_path_to_view = $path2;
		
		include $full_path_to_view;
	}
	
	public static function register_content($content_name, $content)
	{
		self::$contents[$content_name] = $content;
	}
	
	public static function render_content($content_name)
	{
		return self::$contents[$content_name];
	}
}
