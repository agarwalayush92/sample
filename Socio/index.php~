<?php
session_start();

?>
<?php

spl_autoload_register(function ($class) {
		
		$klass = $class;
		$parts = explode('\\', $class);
		$class = end($parts);
		$dir    = '/opt/lampp/htdocs/Socio/plugins';
		
		$files = scandir($dir);

		foreach($files as $file)
		{
			if($file == "." or $file == "..") continue;
			if(is_dir($dir.'/'.$file))
			{
				//echo "$class";
				
				$f = $dir .'/'. $file . '/controllers/' . $class. '.php';
				// if the file exists, require it
				if(!class_exists($klass))
				{	
					if (file_exists($f)) {
						require($f);
					}
				}

				$f = $dir .'/'. $file . '/models/' . $class. '.php';
				// if the file exists, require it
				if(!class_exists($klass))
				{	
					if (file_exists($f)) {
						require($f);
					}
				}
			}
		}
		
		
$base_dir = __DIR__ ;
//die($base_dir);
$file = $base_dir .'/'. $class. '.php';
if(!class_exists($klass))
{
	
	if (file_exists($file)) {
		//die($file);
		require($file);
		
		
	}
}
$file = $base_dir .'/controllers/'. $class. '.php';
// if the file exists, require it
if(!class_exists($klass))
{
	if (file_exists($file)) {
		require($file);
	}
}
	

$file = $base_dir .'/models/'. $class. '.php';
// if the file exists, require it
if(!class_exists($klass))
{
	if (file_exists($file)) {
		require($file);
	}
}
});


use Socio\Database as Database;
use Socio\Settings;
use Socio\Event;

$config = include 'config.php';
Socio\Settings::init($config);
Database::init();

/*$user = User::get(array('id' => '20'));
$user->name = "potter";
$user->gender = "f";
$user->save();*/
Plugin::register();

Socio\Event::fire("framework_ready");

$r = $_GET['r'];

if(isset($r))
{	
	Route::post("register", "RegisterController");
	Route::get("register", "RegisterController");
	Route::get("login", "LoginController");
	Route::post("login", "LoginController");
	Route::get("home", "HomeController");
	Route::post("home", "HomeController");
	Route::get("logout", "LogoutController");
	Route::get("profile/{param}", "ProfileController");
	Route::post("profile/{param}", "ProfileController");
	
	Route::run($r);
}
else
	echo "You dont have access";

?>
