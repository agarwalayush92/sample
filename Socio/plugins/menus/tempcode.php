/*Plugin::add_filter("menus", function($isloggedin){
		
		if($isloggedin)
			array_push($menus, array("Home" => "http://google.com", 
		                             "profile" => "http://google.com", 
									 "logout" => "http://google.com" )
					  );
		else
			array_push($menus, array("Home" => "http://google.com", 
		                             "profile" => "http://google.com", 
									 "login" => "http://google.com" )
					  );
			
		
		echo '<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">WebSiteName</a>
					</div>
				<div>
				<ul class="nav navbar-nav">';
		
		foreach($menus as $menuitem => $menulink)
		{
			echo '<li><a href="' . $menulink . '">' . $menuitem . '</a></li>';
		}
		
		echo '</ul></div></div></nav>';
	});*/