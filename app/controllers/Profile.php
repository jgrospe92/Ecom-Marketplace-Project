<?php

namespace app\controllers;

class Profile extends \app\core\Controller
{


    public function create_profile()
    {

        if (isset($_POST['cancel'])) {
            $user = new \app\models\User();
            $user = $user->getUserByID($_SESSION['user_id']);
            $user->delete();
            session_destroy();
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
                } else {
                    $_SESSION['profile_id'] = $profile->insertWithoutImage();
                }

                // As buyer
                $buyer = new \app\models\Buyer();
                $buyer->shipping_add = $_POST['shipping_add'];
                $buyer->billing_add = $_POST['billing_add'];
                $buyer->credit = $_POST['credit'];
                $buyer->profile_id = $_SESSION['profile_id'];

                $_SESSION['buyer_id'] =  $buyer->insert(); // TODO
                header('location:/Main/index');
            } else {

                $profile = new \app\models\Profile();
                $profile->first_name = $_POST['first_name'];
                $profile->last_name = $_POST['last_name'];
                $profile->role = $_SESSION['role'];
                $profile->user_id = $_SESSION['user_id'];
                $filename = $this->saveFile($_FILES['profile_photo']);


                // As vendor
                $vendor = new \app\models\Vendor();
                $vendor->vendor_name = $_POST['vendor_name'];
                // As vendor, I should have a unique vendor name
                if ($vendor->checkVendorName()) {
                    header('location:/Profile/create_profile?role=' . $_SESSION['role'] . '&error=Store name ' . $_POST['vendor_name'] . ' already exists!');
                    return;
                }

                // if no error, insert into the DB 
                if ($filename) {
                    $profile->profile_photo = $filename;
                    $_SESSION['profile_id'] = $profile->insert();
                } else {
                    $_SESSION['profile_id'] = $profile->insertWithoutImage();
                }



                $vendor->vendor_profit = ($_POST['credit']);
                $vendor->vendor_desc = $_POST['vendor_desc'];
                $vendor->vendor_location = $_POST['vendor_location'];
                $vendor->profile_id = $_SESSION['profile_id'];

                $_SESSION['vendor_id'] =  $vendor->insert();
                header('location:/Main/index');
            }
        } else {
            $this->view('Profile/create_profile');
        }
    }

    public function updateWallet()
    {
        if (isset($_SESSION['role']) == 'buyer') {

            if ($_POST['credit']) {

                $buyer = new \app\models\Buyer();
                $buyer = $buyer->getBuyerUsingProfileId($_SESSION['profile_id']);
                $buyer->credit = $_POST['credit'];
                $buyer->updateWallet();
            }
            exit;
        }
    }

    public function edit_buyer_profile()
    {
        $profile = new \app\models\Profile();
        $buyer = new \app\models\Buyer();

        $profile = $profile->getProfileWithProfileId($_SESSION['profile_id']);
        $buyer = $buyer->getBuyerUsingProfileId($profile->profile_id);

        if (isset($_FILES['file'])) {
            if ($profile->profile_photo !== "blank.jpg") {
                unlink("images/$profile->profile_photo");
            }
            $filename = $this->saveFile($_FILES['file']);
            $profile->profile_photo = $filename;
            $profile->changeProfilePhoto();
        }

        if (isset($_POST['update'])) {

            // UPDATE PROFILE
            $profile->first_name = $_POST['first_name'];
            $profile->last_name = $_POST['last_name'];

            // UPDATE BUYER
            $buyer->shipping_add = $_POST['shipping_add'];
            $buyer->billing_add = $_POST['billing_add'];

            // UPDATE
            $profile->updateProfile();
            $buyer->updateBuyer();
        }

        $this->view('Profile/edit_buyer_profile', ['profile' => $profile, 'buyer' => $buyer, 'role' => $profile->role]);
    }
}
