<?php
namespace app\controllers;

class Profile extends \app\core\Controller {


    public function create_profile()
    {

        if (isset($_POST['cancel'])) {
            $user = new \app\models\User();
            $user = $user->getUserByID($_SESSION['user_id']);
            $user->delete();
            session_destroy();
            header('location:/Main/index');
            exit;
        }

        if (isset($_POST['action'])) {
            if ($_SESSION['role'] == 'buyer') {
                $profile = new \app\models\Profile();
                $profile->first_name = $_POST['first_name'];
                $profile->last_name = $_POST['last_name'];
                $profile->role = $_SESSION['role'];
                $profile->user_id = $_SESSION['user_id'];
                $filename = $this->saveFile($_FILES['profile_photo']);

                if ($filename) {
                    $profile->profile_photo = $filename;
                    $_SESSION['profile_id'] = $profile->insert();
                   
                }

                //buyer table
                $buyer = new \app\models\Buyer();
                $buyer->shipping_add = $_POST['shipping_add'];
                $buyer->billing_add = $_POST['billing_add'];
                $buyer->credit = $_POST['credit'];
                $buyer->profile_id = $_SESSION['profile_id'];
                
                $_SESSION['buyer_id'] =  $buyer->insert(); // TODO
                echo "complete";
                exit;
                header('location:/Main/index');
              
            } else {
                $profile = new \app\models\Profile();
                $profile->first_name = $_POST['first_name'];
                $profile->last_name = $_POST['last_name'];
                $profile->role = $_SESSION['role'];
                $profile->user_id = $_SESSION['user_id'];
                $filename = $this->saveFile($_POST['profile_photo']);
                $_SESSION['profile_id'] = $profile->insert();
                if ($filename) {
                    $profile->profile_photo = $filename;
                    $_SESSION['profile_id'] = $profile->insert();
                    header('location:/Main/index');

            }
        }

     }else {
        $this->view('Profile/create_profile');
    }
    }
}