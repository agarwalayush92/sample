<?php use Socio\Settings as Settings; ?>
<html>
	<head>
		<link rel="stylesheet" href="<?= Settings::asset("style.css")?>">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body style = "background-color :  black;">
		<!-- start of nav bar-->
		<?php echo Plugin::render("menus");?>
		<!-- End of navigation bar-->
		
		<h1 style="color : white;">profile view</h1>
		
		<!-- start of profile edit pluging render-->
		<div style = "float:right">
			<?php echo Plugin::render("edit_profile");?>
		</div>
		<!-- end of profile edit pluging render-->
		
		<p style = "color:white;" >User Name : <?php echo $user->name; ?></p>
		<img src="<?php if($user != null) echo Settings::get('base_url')."uploads/".$user->profile_pic;?>" width="200px" height="200px" /><br /><br />
	
		<div>
			<?php if(isset($post_status))
					Plugin::render("create_post", array("user" => $user, "post_status" => $post_status));
				  else
					Plugin::render("create_post", array("user" => $user));
					  ?>
		</div>
	
		<div style= "width : 500px;" >
		
		<?php Plugin::render("list_posts", $posts); ?>
		</div>
		
	</body>
</html>