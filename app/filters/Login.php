<?php
namespace app\filters;
//defining the Login attribute
#[\Attribute]
class Login extends \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=Please login with your account.');
			return true;
		}
		return false;
	}
}