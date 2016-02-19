<?php
	
	Plugin::add_render("add_friend", function($arr){
		Plugin::render_views("add_friend/button_view.php");
	});
	
