<?php use Socio\Settings as Settings ?>
<html>
	<head>
		<link rel="stylesheet" href="<?= Settings::asset("style.css")?>">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body >
	<!-- -->
	<?php echo Plugin::render("menus");?>
	<!-- End of navigation bar-->
	<h1 style="color : white;">register</h1>
	<?php if( isset($status)){ echo '<br/><h1 style="color:white;">'; echo ($status == 0)? "success" : "no success"; echo '</h1>';  } 	 ?>
	<div style = "float:left;">
	<form method="post" action = "/Socio/register">
		<input type="text" placeholder = "name" name = "name"><br/><br/>
		<input type="text" placeholder = "email" name = "email"><br/><br/>
		<input type="password" placeholder = "password" name = "password"><br/><br/>
		<input type="text" placeholder = "age" name = "age"><br/><br/>
		<select name = "sex">
			<option value = "">Select Gender</option>
			<option value = "m">Male</option>
			<option value = "f">Female</option>
		</select><br/><br/>
		<input type = "submit" value = "Submit" />
	</form>	
	</div>
	
	<div style = "float:right;">
	<h1 style="color : white;">login</h1>
	<form method="post" action = "/Socio/login">
		<input type="text" placeholder = "email" name = "email"><br/><br/>
		<input type="password" placeholder = "password" name = "password"><br/><br/>
		<input type = "submit" value = "Submit" />
	</form>	
	</div>
	
	</body>
</html>
