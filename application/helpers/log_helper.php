<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function cek_session(){
	$CI = & get_instance();
	$session = $CI->session->userdata('spkhmd_login');
	$menu = strtolower($CI->uri->segment(1));
	$roleId = $CI->session->userdata('roleId');
	if($session!="1"){
		redirect('login');
	} elseif (($menu == 'admin' && $roleId != '1') || ($menu == 'user' && $roleId != '2')) {
		redirect('authentications');
	}
}

function cek_session_login(){
	$CI = & get_instance();
	$session = $CI->session->userdata('spkhmd_login');
	if($session=="1"){
		redirect('authentications');
	}
}
