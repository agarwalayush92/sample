<?php
class Post extends Model
{	
	protected static $table = "post";
	protected static $attributes = array ("user1", "user2" , "text", "activityid", "id");
}