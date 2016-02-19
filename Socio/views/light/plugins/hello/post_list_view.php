<div style = "border : solid white; margin-bottom : 5px; background-color:violet;"><a href= "<?php echo $post -> user1_link; ?>">
	<img src="<?Php echo $post->user1_pic; ?>" width="50" height="50" /> </a>
	<p style = "color : white;"> 
	<a href="<?php echo $post -> user1_link; ?>"> <?php echo $post->user1_name;?></a>has posted to <a href="<?php echo $post -> user2_link; ?> "> <?php echo $post->user2_name; ?> </a>wall</p>
													<p style = "color : white;"> <?php echo $post->text; ?> </p>
													<p style = "color : white;">  <?php echo $post->timestamp; ?> </p></div>
	<div><label name"post_comments"><label> <br/> 
		<textarea rows = "2" cols = "50" name = "comment" placeholder = "Add Comments"></textarea> 
		<button type="submit">Add Comment </button>
		</div>
	<?php echo Plugin::render_content("share"); ?>													
	<!-- -->