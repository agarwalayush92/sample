<?php 

class Session
{
	static function get($key)
	{
		if(isset($_SESSION["$key"]))
			return $_SESSION["$key"];
		else null;
	}
	static function set($key,$value)
	{
		$_SESSION["$key"]="$value";
	}
	static function unsetSession()
	{
		unset($_SESSION['id']);
	}
}