<?php


function ts_is_login($redirect=false){ // redirect = 'url'
	if(ts_get_username() == false){
		redirect('login');
	}
}

function check_login(){
	if(ts_get_username() != false){
		redirect('panel/software');
	}
}

function ts_get_level(){
	return (isset($_SESSION['level']))?$_SESSION['level']:false;
}

function ts_get_username(){
	return (isset($_SESSION['username']))?$_SESSION['username']:false;
}

