<?php 

namespace Socio{ 

class Event{
		
		protected static $event_list = array();
		
		public static function listen($event, $func)
		{ 
			if(isset(self::$event_list[$event]))
			{
				array_push(self::$event_list[$event], $func); 
			}
			else
			{
				self::$event_list[$event] = array($func);
			}
		}
		
		public static function fire($event, $param = null)
		{
			if(isset(self::$event_list[$event]))
			{
				$evnt_func_arr = self::$event_list[$event];
				foreach($evnt_func_arr as $func)
					if(isset($param))
						$func($param);
					else	
						$func();
			}
		}
	}
}


