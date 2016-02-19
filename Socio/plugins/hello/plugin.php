<?php

	use Socio\Event;
	
	View::add_js("google-analytics.js");
	View::add_js("google-min.js");
	
	Plugin::register_content("share", '<div class="fb-share-button" data-href= "https://www.google.com" data-layout="button_count"></div> ');
	
	Route::get("plugintest2", "PluginTestController2");
	Route::get("plugintest", "PluginTestController");
	
	Socio\Event::listen("framework_ready", function(){
		Plugin::add_filter("menus", function ($arr){
			
			if(User::isLoggedIn())
				$arr["Posts"] = "posts_link";
			
			return $arr;
		});
	});
	
	Plugin::add_render("list_posts", function($posts){
		
		foreach($posts as $post)
			{
				Plugin::render_views("hello/post_list_view.php", array("post" => $post));
			}
	});
	
	
	
	Plugin::add_render("create_post", function($arr){
		echo '<form action="/socio/profile/' . $arr["user"]->id . '" method="post">';
		
		if(isset($arr["post_status"])) 
			if(!$arr["post_status"]) 
				echo '<h1 style = "color:white;">Posted</h1>';
				
		echo '<label style = "color : white">wall</label><br/>
				<textarea rows = "5" cols = "100" name = "wallpost">
				</textarea>
				<button type = "submit">Post</button>
			</form>';
	});
	