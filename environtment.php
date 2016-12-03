<?php
if(strpos($_SERVER['HTTP_HOST'],"malangsoftware") != ""){
	define('DEVELOPMENT', false);
	$protocol = 'https://';
}else{
	define('DEVELOPMENT', true);
	$protocol = 'http://';
}

define('HOMEPAGEURL', $protocol . $_SERVER['HTTP_HOST']);
//end of file