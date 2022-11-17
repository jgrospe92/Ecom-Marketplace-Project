<?php
namespace app\controllers;

class User extends \app\core\Controller {

	//NOTE: USER LOGIN
    public function index()
	{
	
		if (isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);
			if (password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['username'] = $user->username;
	
				$profile = new \app\models\Profile();
                $profile->user_id = $_SESSION['user_id'];
                $profile = $profile->get();
                $_SESSION['profile_id'] = $profile->profile_id;
                $_SESSION['role'] = $profile->role;

				header('location:/Main/index');
			} else {
				header('location:/User/index?error=Wrong username/password combination');
			}
		}else {
			$this->view('User/login');
		} 
    }

    //NOTE: Register account for buyer and vendor
    public function register()
    {
		if (isset($_POST['role'])){
			$_SESSION['role'] = $_POST['role'];
		}
		
		if (isset($_POST['action'])){
			if ($_POST['password'] == $_POST['password_verify']) {
				$user = new \app\models\User();
				$check = $user->get($_POST['username']);
				if (!$check) {
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$_SESSION['user_id'] = $user->insert();
					$_SESSION['username'] = $user->username;
					
					header('location:/Profile/create_profile?role=' . $_SESSION['role']);
						
				}else {
					header('location:/User/register?error=The username "'.$_POST['username'].'" is already in use. Select another.');
				}
			}else {
				header('location:/User/register?error=Passwords do not match.');
			}

		}else {
			$this->view('User/register');
			
		}
    }

    //NOTE: LOGOUT USER
    public function logout()
    {
		session_destroy();
		header('location:/Main/index');
	}
}