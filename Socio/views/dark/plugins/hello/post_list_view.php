<div style = "border : solid white; margin-bottom : 5px; background-color:red;"><a href= "<?php echo $post -> user1_link; ?>">
	<img src="<?Php echo $post->user1_pic; ?>" width="50" height="50" /> </a>
	<p style = "color : white;"> 
	<a href="<?php echo $post -> user1_link; ?>"> <?php echo $post->user1_name;?></a>has posted to <a href="<?php echo $post -> user2_link; ?> "> <?php echo $post->user2_name; ?> </a>wall</p>
													<p style = "color : white;"> <?php echo $post->text; ?> </p>
													<p style = "color : white;">  <?php echo $post->timestamp; ?> </p></div>