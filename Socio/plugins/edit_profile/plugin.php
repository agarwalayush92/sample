<?php

	Plugin::add_render("edit_profile", function(){
		$user = User::get(array("id" => Session::get('id')));
		Plugin::render_views("edit_profile/edit_view.php", array("user" => $user));
	});
