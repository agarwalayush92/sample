<?php

class HomeController {

//use Socio\Event;

public function get(){
	if(User::isLoggedIn())
	{
		$arr = Post::where("user1","=", Session::get("id")." ORDER BY timestamp DESC" );
		$users = User::all();
		View::render("home_view", array("arr" => $arr, "users" => $users));
	}
	else
		header("Location:/Socio/login");
	

}
	public function post()
 	{
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
				$filename = "$dir/uploads/profile_pic/$file".$ext;
				// Copy the file (if it is deemed safe)
				if (!is_uploaded_file($_FILES['upload']['tmp_name']) or
					!copy($_FILES['upload']['tmp_name'], $filename))
				{
					$error = "Could not save file as $filename!";
					exit();
				}
				else
				{
					Socio\Event::fire("image_uploaded", "$filename");
					if(User::updatePicture("$file$ext"))
					{
						$arr = Post::where("user1","=", Session::get("id")." ORDER BY timestamp DESC" );
						$users = User::all();
						View::render("home_view", array("upload_status" => true, "arr" => $arr, "users" => $users));
					}
					
					//render("/home_view.php", array("image"=> User::getImage()));
				}
			}
		}
			else if(isset($_POST['wallpost']))
			{
				//this code is for wall post
				$post = new Post;
				$p_status = $post->create( array("text" => $_POST['wallpost'], "user1" => Session::get('id'), "user2" => Session::get('id'), "activityid" => "1" ));
				$arr = Post::where("user1","=", Session::get("id")." ORDER BY timestamp DESC" );
				$users = User::all();
				View::render("home_view", array("post_status" => $p_status, "arr" => $arr, "users" => $users));
			}
	}


}
