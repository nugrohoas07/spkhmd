<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cek_session(){
	$CI = & get_instance();
	$session = $CI->session->userdata('sistem_login');
	$menu = strtolower($CI->uri->segment(1));
	$role = $CI->session->userdata('role');
	if($session!="1"){
		redirect('login');
	} elseif (($menu == 'admin' && $role != 'admin') || ($menu == 'user' && $role != 'user')) {
		redirect('authentications');
	}
}

function cek_session_login(){
	$CI = & get_instance();
	$session = $CI->session->userdata('sistem_login');
	if($session=="1"){
		redirect('authentications');
	}
}
