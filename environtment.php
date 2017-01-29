<?php
/*if(strpos($_SERVER['HTTP_HOST'],"malangsoftware") != ""){
	define('DEVELOPMENT', false);
	$protocol = 'https://';
	define('DB_NAME', 'rohmanah_AdMTrsi');
	define('DB_USER', 'rohmanah_rwiWP1');
	define('DB_PASSWORD', '7@)90G9SP9');
}else{*/
	define('DEVELOPMENT', true);
	$protocol = 'http://';
	define('DB_NAME', 'mlg_software');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');


define('HOMEPAGEURL', $protocol . $_SERVER['HTTP_HOST']);
//end of file