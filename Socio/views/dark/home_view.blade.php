<html>
	<head>
	</head>
	<body style = "background-color :  yellow;">
	<?php //if(isset($message)) echo "$message"; ?>
	<?php /*if(isset($user)) {
		foreach($user as $u)
		{
			echo $u->name; echo "<br />";
			echo $u->email; echo "<br />";
			echo $u->gender; echo "<br />";
			echo $u->age; echo "<br /> <br />";
		}
		
	}  */
    ?>
	{{{"authenticated"}}}
	{{{"Name"}}}
	<?php $name = Auth::user()-> name ;
	echo $name; ?>
	<a href = "{{{ URL::to('logout') }}} "> Logout </a>
		
	</body>
</html>
