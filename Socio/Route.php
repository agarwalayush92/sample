<?php 
class Route
{ 
	static $routesGet=array();
	static $routesPost=array();
	
	static function get($x,$y)
	{
		self::$routesGet[$x]=$y;
	}
	static function post($x,$y)
	{
		self::$routesPost[$x]=$y;
	}
	static function run($temp)
	{
		if($_SERVER['REQUEST_METHOD']=="GET")
		{
			$tmp = explode("/", $temp);
			$len = count($tmp);
			$rString = $tmp[0];
			
			$parameter = "";
			
			for($i = 1; $i < $len; $i++)
			{
				$rString .= "/{param}";
				$parameter .= $tmp[$i] . ',';
			}	
			
			$parameter = substr($parameter, 0, count($parameter)-2);
			if(isset(self::$routesGet[$rString]))
			{
				$controller = new self::$routesGet[$rString];
				$controller->get("{$parameter}");
			}
			else
				echo "<h1>Access Denied</h1>";
		}
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			$tmp = explode("/",$temp);
			$len = count($tmp);
			$rString = $tmp[0];
			
			$parameter = "";
			
			for($i = 1; $i < $len; $i++)
			{
				$rString .= "/{param}";
				$parameter .= $tmp[$i] . ',';
			}	
			
			$parameter = substr($parameter, 0, count($parameter)-2);
			
			if(isset(self::$routesPost[$rString]))
			{
				$controller = new self::$routesPost[$rString];
				$controller->post("{$parameter}");
			}
			else
				echo "<h1>Access Denied</h1>";
		}
	}
}
