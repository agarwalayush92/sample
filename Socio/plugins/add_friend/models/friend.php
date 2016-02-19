<?php 


class Friend extends Model{
	
	
	protected static $table = "friends";
	protected static $attributes = array ( "user1" , "user2", "type");
	
	public function addFriend($arr)
	{
		$sql1 = "INSERT INTO ".static::$table ."(";
		$sql2 = ") VALUES(";
		
		foreach(static::$attributes as $attrib)
		{
			$sql1 .= $attrib . ', ';
			$sql2 .= (isset($arr[$attrib])) ? "'" . $arr[$attrib] . "', "  
			                                :  "' ', ";
		}
		
		$sql1 = substr($sql1, 0, count($sql1)-3);
		$sql2 = substr($sql2, 0, count($sql2)-3);
		
		$sql = $sql1 . $sql2 . ');';
	
		$result = mysql_query( $sql);
		
		if (!$result) {
			return 1;
		}
		else
			return 0;
	}
	
	public static function getFriends($userid)
	{
		$sql1 = "SELECT user2 from". $table. "where user1 = $userid";  
	
		$result = mysql_query( $sql);
		
		if (!$result) {
			return 1;
		}
		else
			return 0;

	}
	
	public static function getCommonFriends($user1,$user2)
	{
	
	}

	public static function deleteFriend($userid)
	{
		
	}
	
	public static function logout()
	{
		Session::unsetSession();
		
		
	}
	
	
}
