<?php use Socio\Settings as Settings; ?>
<html>
	<head>
		<link rel="stylesheet" href="<?= Settings::asset("style.css")?>">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body style = "background-color :  white;">
	<!-- start of fb share button -->
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end of fb share button plugin-->

		<!-- start of nav bar-->
		<?php echo Plugin::render("menus");?>
		<!-- End of navigation bar-->
		
		<!-- cover pic -->
		<img src="<?php if($user != null) echo Settings::get('base_url')."uploads/cover_pic/".$user->cover_pic;?>" width="100%" height="200px" /><br /><br />
		
		<!-- cover pic end -->	
		
		<div>
		<?php $id = Session::get("id"); ?>
		<form action= <?php echo "/Socio/profile/".$id  ?> method="post"
			enctype="multipart/form-data"> 
			<label for="upload" style = "color:black">Select file to upload cover pic:</label>
			<input type="file" id="upload" name="upload"><br/>
			<input type="submit" value="Submit">

		</form>
			<div style="float:right">
				<?php Plugin::render("add_friend",$user);?>
			</div>
		</div>
		<h1 >profile view</h1>
		<!-- start of profile edit pluging render-->
		<div style = "float:right">
			<?php echo Plugin::render("edit_profile");?>
		</div>
		<!-- end of profile edit pluging render-->
		
		<p >User Name : <?php echo $user->name; ?></p>
		<img src="<?php if($user != null) echo Settings::get('base_url')."uploads/profile_pic/".$user->profile_pic;?>" width="200px" height="200px" /><br /><br />
	
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
