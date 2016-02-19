<?php
class Model
{
	
	protected $attributes_values = array();
	
	public static function create($arr){
		
		//forming sql query based on the parameters passed
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
	
	public static function get($arr){
		
		foreach($arr as $key => $value)
			$sql = "SELECT * FROM ". static::$table . " WHERE $key = $value;";
		
		$cls = get_called_class();
		$obj = new $cls;
		
		$result = mysql_query( $sql);
		
		if(mysql_num_rows($result) > 0)
		{
			$values = mysql_fetch_assoc($result);
		
			foreach($values as $key => $value)
				$obj->$key = $value;
			
			return $obj;
		}
		else
			return false;
		
	}
	
	public static function all()
	{
		$sql = "SELECT * FROM ". static::$table . ";";
		
		$result = mysql_query( $sql);
		
		$objs = array();
		$count = 0;
		while($row = mysql_fetch_assoc($result))
		{
			$obj = new stdClass;
			
			foreach($row as $key => $value)
				$obj->$key = $value;
				
			$objs[$count++] = $obj;  
		}
		
		return $objs;
	}
	
	public static function where($param1,$param2,$param3)
	{
		$sql = "SELECT * FROM ". static::$table . " WHERE $param1 $param2 $param3;";
		
		$result = mysql_query( $sql);
		
		$objs = null;
		$count = 0;
		
		while($row = mysql_fetch_assoc($result))
		{
			$obj = new stdClass;
			
			foreach($row as $key => $value)
				$obj->$key = $value;
				
			$objs[$count++] = $obj;  
		}
		
		return $objs;
	}
	
	public function __get($name)
	{
		return $this->attributes_values[$name];
	}
	
	public function __set($name, $value)
	{
		$this->attributes_values[$name] = $value;
	}
	
	public function save()
	{
		$sql = "UPDATE ". static::$table ." SET ";
		
		foreach($this->attributes_values as $key => $value)
		{
			$sql .= $key . ' = \''. $value . '\', ';
		}
		
		$sql = substr($sql, 0, count($sql)-3);
		$sql .= " WHERE id = ".$this->id.';';
		
		$result = mysql_query( $sql);
		if (!$result) {
			return false;
		}
		else
			return true;
	}
	
}
