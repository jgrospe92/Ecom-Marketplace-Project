<?php
namespace app\controllers;

class User extends \app\core\Controller {

    public function index(){
        $this->view('User/login');
    }

    // NOTE: 
    public function register()
    {
		if (isset($_POST['action'])){
			if ($_POST['password'] == $_POST['password_verify']) {
				$user = new \app\models\User();
				$check = $user->get($_POST['username']);
				if (!$check) {
					$user->username = $_POST['username'];
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->insert();
                    header('location:/Main/index');
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
		header('location:/User/index');
	}
}