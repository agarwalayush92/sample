<?php
namespace Socio {
	
	use Socio\Settings as Settings;
	class Database{
	
		public static function init()
		{
			$dbhandle = mysql_connect(Settings::get("servername"), Settings::get("username"), Settings::get("pass")) 
						or die("Unable to connect to MySQL");
		
			mysql_select_db(Settings::get("dbname"),$dbhandle) or die("Could not select examples");
			
		}
	}
} 

