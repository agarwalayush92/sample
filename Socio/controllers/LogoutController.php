<?php

class LogoutController {

public function get(){
		User::logout();
		include '/../views/'.Settings::get("theme").'/register_view.php';

}
public function post(){
	

}


}
