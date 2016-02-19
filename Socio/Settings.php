<?php 
namespace Socio
{
	class Settings
	{
		public static $config = null;
		
		public static function init($config)
		{
			self::$config = $config;
		}
		
		public static function get($key)
		{
			return self::$config[$key];
		}
		public static function asset($style)
		{
			return self::$config["base_url"]. 'assets/' .self::$config["theme"]. '/' .$style;
		}
	}
}