<?php
/**
 * Created by PhpStorm.
 * User: andriusbutkys
 * Date: 12/11/2018
 * Time: 19:20
 */

class Session {
	
	private $admin_id;
	public $username;
	public $last_login;
	
	//----- Methods -----//
	public const MAX_LOGIN_AGE = 60*60*24;
	
	public function __construct()
	{
		session_start();
		$this->checked_stored_login();
	}
	
	public function login($admin){
		if ($admin){
			session_regenerate_id();
			$this->admin_id = $_SESSION['admin_id'] = $admin->id;
			$this->username = $_SESSION['username'] = $admin->username;
			$this->last_login = $_SESSION['last_login'] = time();
		}
		return TRUE;
	}
	
	public function is_logged_in(){
//		return isset($this->admin_id);
		return isset($this->admin_id) && $this->last_login_is_recent();
	}
	
	public function logout(){
		unset($_SESSION['admin_id']);
		unset($_SESSION['username']);
		unset($_SESSION['last_login']);
		unset($this->admin_id);
		unset($this->username);
		unset($this->last_login);
		return TRUE;
	}
	
	private function checked_stored_login(){
		if (isset($_SESSION['admin_id'])){
			$this->admin_id = $_SESSION['admin_id'];
			$this->username = $_SESSION['username'];
			$this->last_login = $_SESSION['last_login'];
		}
	}
	
	private  function last_login_is_recent(){
		if (!isset($this->last_login)){
			return FALSE;
		}elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()){
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function message($msg=""){
		if (!empty($msg)){
			$_SESSION['message'] = $msg;
			return TRUE;
		}else{
			return $_SESSION['message'] ?? '';
		}
	}
	
	public function clear_message(){
		unset($_SESSION['message']);
	}
	
}