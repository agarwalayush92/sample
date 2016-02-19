<?php use Socio\Settings as Settings; 
	use Socio\Event;	?>
<?php

class ProfileController
{
	public function get($id)
	{
		if(User::isLoggedIn())
		{
			$objs = Post::where("(user1 = $id", "or", "user2 = $id) && activityid = 1 ORDER BY timestamp DESC" );
			
			$posts = null;
			$count = 0;
			if(isset($objs))
			{
				foreach($objs as $obj)
				{
					$user1 = User::get(array("id" => $obj->user1));
					$user2 = User::get(array("id" => $obj->user2));
					
					$obx = new stdClass;
					$obx->timestamp = $obj->timestamp;
					$obx->postid = $obj->id;
					$obx->text = $obj->text;
					
					$obx->user1_pic = Settings::get("base_url"). 'uploads/profile_pic/' .$user1->profile_pic;
					$obx->user1_coverpic = Settings::get("base_url"). 'uploads/cover_pic/' .$user1->cover_pic;
					//die($obx->user1_pic);
					$obx->user1_link = Settings::get("base_url"). 'profile/' .$user1->id;;
					$obx->user1_name = $user1->name;
					$obx->user1_id = $user1->id;
					
					$obx->user2_link = Settings::get("base_url"). 'profile/' .$user2->id;
					$obx->user2_name = $user2->name;
					$obx->user2_id = $user2->id;
					
					$posts[$count++] = $obx;
				}
			
				$user = User::get(array("id" => $id));
			
				if($user && $posts)
					View::render("profile_view", array("user" => $user, "posts" => $posts));
				else
					echo "<h1>404 Error</h1>";
			}
			else
				echo "<h1>404 Error</h1>";
		}
		else
			header("Location:/socio/login");
		

	}
	
	public function post($id)
	{
		if(isset($_POST['wallpost']))
		{
			//this code is for wall post
			$p_status = Post::create( array("text" => $_POST['wallpost'], "user1" => Session::get('id'), "user2" => $id, "activityid" => "1" ));
			
			$objs = Post::where("(user1 = $id", "or", "user2 = $id) && activityid = 1 ORDER BY timestamp DESC" );
			
			$posts = null;
			$count = 0; 
			foreach($objs as $obj)
			{
				$user1 = User::get(array("id" => $obj->user1));
				$user2 = User::get(array("id" => $obj->user2));
				
				$obx = new stdClass;
				$obx->timestamp = $obj->timestamp;
				$obx->postid = $obj->id;
				$obx->text = $obj->text;
				
				$obx->user1_pic = Settings::get("base_url"). 'uploads/profile_pic' .$user1->profile_pic;
				$obx->user1_coverpic = Settings::get("base_url"). 'uploads/cover_pic/' .$user1->cover_pic;
				$obx->user1_link = Settings::get("base_url"). 'profile/' .$user1->id;
				$obx->user1_name = $user1->name;
				$obx->user1_id = $user1->id;
				
				$obx->user2_link = Settings::get("base_url"). 'profile/' .$user2->id;
				$obx->user2_name = $user2->name;
				$obx->user2_id = $user2->id;
				
				$posts[$count++] = $obx;
			}
			
			$user = User::get(array("id" => $id));
			
			if($user && $posts)
				View::render("profile_view", array("post_status" => $p_status, "user" => $user , "posts" => $posts));
		}
		
		if(isset($_POST['edit_profile']))
		{
			$user = User::get(array("id" => Session::get("id")));
			
			$user->name = $_POST['name'];
			$user->email = $_POST['email'];
			$user->age = $_POST['age'];
			$user->password = $_POST['password'];
		
			$user->gender = $_POST['gender'];

			$user->save();
			
			
			$objs = Post::where("(user1 = $id", "or", "user2 = $id) && activityid = 1 ORDER BY timestamp DESC" );
			
			$posts = null;
			$count = 0; 
			foreach($objs as $obj)
			{
				$user1 = User::get(array("id" => $obj->user1));
				$user2 = User::get(array("id" => $obj->user2));
				
				$obx = new stdClass;
				$obx->timestamp = $obj->timestamp;
				$obx->postid = $obj->id;
				$obx->text = $obj->text;
				
				$obx->user1_pic = Settings::get("base_url"). 'uploads/profile_pic' .$user1->profile_pic;
				$obx->user1_link = Settings::get("base_url"). 'profile/' .$user1->id;
				$obx->user1_name = $user1->name;
				$obx->user1_id = $user1->id;
				
				$obx->user2_link = Settings::get("base_url"). 'profile/' .$user2->id;
				$obx->user2_name = $user2->name;
				$obx->user2_id = $user2->id;
				
				$posts[$count++] = $obx;
			}
			
			$user = User::get(array("id" => $id));
			
			if($user && $posts)
				View::render("profile_view", array("user" => $user , "posts" => $posts));
		}
		if(isset($_FILES['upload']))
		{
			//this code for upload picture
			$ext = "";
			$flag = false;
			
			if (preg_match('/^image\/p?jpeg$/i', $_FILES['upload']['type']))
			{
				$ext = '.jpeg';
				$flag = true;
			}
			else if (preg_match('/^image\/gif$/i', $_FILES['upload']['type']))
			{
				$ext = '.gif';
				$flag = true;
			}
			else if (preg_match('/^image\/(x-)?png$/i', $_FILES['upload']['type']))
			{
				$ext = '.png';
				$flag = true;
			}
			
			if($flag)
			{
				// The complete path/filename
				$file = Session::get("id");				
				$dir=__DIR__;
				$dir = substr($dir, 0, count($dir)-13);
				$filename = "$dir/uploads/cover_pic/$file".$ext;
				//die(print_r($_FILES['upload']['tmp_name']));
				// Copy the file (if it is deemed safe)
				if (!is_uploaded_file($_FILES['upload']['tmp_name']) or
					!copy($_FILES['upload']['tmp_name'], $filename))
				{
					$error = "Could not save file as $filename!";
					exit();
				}
				else 
					if(User::updateCoverPicture("$file$ext"))
					{
						$users = User::all();
						$hre = Session::get('id');
						header("Location: $hre");
					}
			} // if flag statement ends
		} // upload ends

		if(isset($_POST['friendbutton']))
		{
			
			
		}
	}
}
