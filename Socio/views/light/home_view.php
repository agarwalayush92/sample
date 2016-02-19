<?php use Socio\Settings as Settings;?>

<html>
	<head>
		<link rel="stylesheet" href="<?= Settings::asset("style.css")?>">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<?php echo View::render_js(); ?>
	</head>
	<body style="background-color : violet">
		<!-- -->
		<?php echo Plugin::render("menus");?>
		<!-- End of navigation bar-->
		<h1 style="color : white;">home</h1>
		<?php
			if(isset($upload_status)) echo '<h1 style="color : white;">uploaded success</h1>';
		?>
		<img src="<?php $user = User::get(array("id" => Session::get('id')));
						if($user != null) echo Settings::get('base_url')."uploads/".$user->profile_pic; 
				  ?>" width="200px" height="200px" /><br /><br />
		<div>
		<form action="/Socio/home" method="post"
			enctype="multipart/form-data"> 
			<label for="upload" style = "color:white">Select file to upload:</label>
			<input type="file" id="upload" name="upload"><br/>
			<input type="submit" value="Submit">
		</form>
		</div>
		
		<div>
		
			<form action="/Socio/home" method="post">
				<?php if(isset($post_status)) if(!$post_status) echo '<h1 style = "color:white;">Posted</h1>'; ?>
				<label style = "color : white">what's on your mind</label><br/>
				<textarea rows = "5" cols = "100" name = "wallpost">
				</textarea>
				<button type = "submit">Post</button>
			</form>
		</div>
	
		<div>
			<?php
				if(isset($arr))
				{
					foreach($arr as $a)
					{
						echo '<p style = "color : white;">' . $a->text . '</p><br/>';
					}
				}
			?>
		</div>
		<div style = "float : right;">
			<h1 style = "color : white;">All users list</h1>
			<?php
				if(isset($users))
				{
					foreach($users as $u)
					{
						$url = Settings::get('base_url');
						echo '<a href = "'. $url .'profile/'.$u->id.'" style = "color : white;"><img src = "'. $url .'/uploads/'. $u->profile_pic .'" width = "50" height = "50">'. $u->name .'</a><br/>';
					}
				}
			?>
		</div>
		
	</body>
</html>
