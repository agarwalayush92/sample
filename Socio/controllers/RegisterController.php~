<?php

class RegisterController {

public function get(){
	if(User::isLoggedIn())
		header("Location:/Socio/home");
	else
		View::render("register_view");
	
		

}
public function post(){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$age = $_POST['age'];
	$gender = $_POST['sex'];
	$user = new User;
	
	$status = User::create( array("name" => $name,"email" => $email, "password" => $password, "age" =>$age, "gender" => $gender) );

	View::render("register_view", array("status" => $status));

}


}
