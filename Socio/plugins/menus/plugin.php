<?php 
	use socio\Event as Event;
	
	Plugin::create_filter("menus", function(){
		if(User::isLoggedIn())
			return array("home" => '/Socio/home');
		else
			return array();
	});
	
Event::listen("framework_ready", function(){

	
	Plugin::add_filter("menus", function ($arr){
		if(User::isLoggedIn())
			$arr["Profile"] = "/Socio/profile/". Session::get("id");
		
		return $arr;
	});
	
	Plugin::add_filter("menus", function ($arr){
		if(User::isLoggedIn())
			$arr["edit"] = "/Socio/edit/";
		
		return $arr;
	});
	
	Plugin::add_filter("menus", function ($arr){
		if(!User::isLoggedIn())
			$arr["login"] = "/Socio/login";
		
		return $arr;
	});
	
	Plugin::add_filter("menus", function ($arr){
		if(User::isLoggedIn())
			$arr["logout"] = "/Socio/logout";
		
		return $arr;
	});
	
	
	Plugin::add_render("menus", function(){
		$menus = Plugin::get_filters("menus");

		$arr = array();
		$f = true;
		foreach($menus as $menu)
		{
			if($f)
			{
				$arr = $menu();
				$f = false;
			}
			else
				$arr = $menu($arr);
		}
		
		echo '<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div>
				<div>
				<ul class="nav navbar-nav navbar-right">';
		
		foreach($arr as $menuitem => $menulink)
		{
			echo '<li><a href="' . $menulink . '">' . $menuitem . '</a></li>';
		}
		
		echo '</ul></div></div></nav>';
	});
	
});
