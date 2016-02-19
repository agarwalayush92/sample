<?php
class Comment extends Model
{	
	protected static $table = "comments";
	protected static $attributes = array ("postid", "userid" , "comment", "timestamp");
}