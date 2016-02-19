<?php 


class User extends Model{
	
	
	protected static $table = "user";
	protected static $attributes = array ( "name" , "password", "email" , "age", "gender", "id");
	
	public function login($email,$password)
	{
		$sql = "SELECT name,age,password,id FROM user WHERE email = '$email'";
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result))
		{
			if($row[2]==$password)
		  {
			  Session::set("id", $row[3]);
			  return 0;
		  }
		  else
		  {
			  return 1;
		  }
		}
	}
	
	public static function isLoggedIn()
	{
		
		if(Session::get("id") != null)
		{
			return true;
		}
		else 
			return false;
	}
	
	public static function updatePicture($pic)
	{
		$sql = "UPDATE user SET profile_pic = '$pic' WHERE id = " . Session::get('id');
		$result = mysql_query($sql);
		
		if (!$result) {
			return false;
		}
		else
			return true;
	}

	public static function updateCoverPicture($pic)
	{
		$sql = "UPDATE user SET cover_pic = '$pic' WHERE id = " . Session::get('id');
		$result = mysql_query($sql);
		
		if (!$result) {
			return false;
		}
		else
			return true;
	}
	
	public static function logout()
	{
		Session::unsetSession();
		
		
	}
	
	
}
