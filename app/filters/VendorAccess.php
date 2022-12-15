<?php
namespace app\filters;
//defining the Login attribute
#[\Attribute]
class VendorAccess extends \app\core\AccessFilter{
	public function execute(){
		if($_SESSION['role'] != "vendor" ){
			header('location:/Main/index?error=Please login with your vendor account to access this feature.');
			return true;
		}
		return false;
	}
}