<?php
$path='software/file-images/';
$width='';
$height='';

if(isset($_GET['type'])){
	if($_GET['type']=='sft'){
		$path='software/file-images/';
	}elseif($_GET['type']=='pp'){
		$path='profile_pic/';	
	}
}
	
if(isset($_GET['cm'])){
	$custom=$_GET['cm'];
	$xpos=strpos($custom,'x');
	$width=substr($custom,0,$xpos);
	$height=substr($custom,$xpos+1,strlen($custom));
}

define('DEFAULT_HEIGHT',$height);
define('DEFAULT_WIDTH',$width);
define('MYSRCPATH',$path);
//echo MYHEIGHT . ' | ' .MYWIDTH. ' | ' .MYSRCPATH;
?>