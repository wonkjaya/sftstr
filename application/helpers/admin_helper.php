<?php


function ts_is_login($redirect=false){ // redirect = 'url'
	if(ts_get_level() !== false){
		$url=(ts_get_level() == '00')?'admin':'user';
	}
	if($redirect == true and isset($url))	redirect($url);
	return ts_get_username();
}

function ts_get_level(){
	return (isset($_SESSION['level']))?$_SESSION['level']:false;
}

function ts_get_username(){
	return (isset($_SESSION['username']))?$_SESSION['username']:false;
}

