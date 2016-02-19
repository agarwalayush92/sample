<?php

class LoginController {

public function get(){
	if(User::isLoggedIn())
		header("Location:/Socio/home");
	else
		View::render("register_view");

}
public function post(){
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user = new User;
	
	$status = $user->login($email,$password);

	if($status==0)
	{
		header('Location: /Socio/home');
	}
	else
	{
		View::render("register_view");
	}

}


}
