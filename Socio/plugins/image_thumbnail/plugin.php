<?php 

use socio\Event as Event;

Event::listen("image_uploaded", function($path){
	
	list($width, $height) = getimagesize($path);
	$newwidth = 300;
	$newheight = 300;
	
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$var = explode('.', $path);
	$func = "imagecreatefrom{$var[1]}";
	$source = $func($path);
	
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	// Output and free memory
	//the resized image will be 400x300
	$func = "image{$var[1]}";
	return $func($thumb, $path);
});