<?php
if(strpos($_SERVER['HTTP_HOST'],"malangsoftware") != ""){
	define('DEVELOPMENT', false);
}else{
	define('DEVELOPMENT', true);
}
//end of file