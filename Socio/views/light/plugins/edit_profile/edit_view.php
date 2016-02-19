<div>
			<button onClick = "showDiv();">Edit Profile</button>
			<script>
				function showDiv()
				{
					var panel = document.getElementById("panel");
					panel.style.display = "block";
					
				}
			</script>
			
			<div id = "panel" style = "display : none; background-color:blue;">
				<br/>
				<form method="post" action = "/socio/profile/<?php echo $user->id; ?>">
					<input type = "hidden" name = "edit_profile" value = "edit_profile" />
					<input type="text" placeholder = "name" name = "name" value = "<?php echo $user->name; ?>"><br/><br/>
					<input type="text" placeholder = "email" name = "email" value = "<?php echo $user->email; ?>"><br/><br/>
					<input type="password" placeholder = "password" name = "password" value = "<?php echo $user->password; ?>"><br/><br/>
					<input type="text" placeholder = "age" name = "age" value = "<?php echo $user->age; ?>"><br/><br/>
					<select name = "gender"> 
						<option value = "">Select Gender</option>
						<option value = "m" <?php if($user->gender === "m") echo 'selected = "selected"'; ?>>Male</option>
						<option value = "f" <?php if($user->gender === "f") echo 'selected = "selected"'; ?>>Female</option>
					</select><br/><br/>
					<input type = "submit" value = "update" />
				</form>	
				
				
			</div>
			
		</div>