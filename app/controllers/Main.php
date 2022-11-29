<?php 

namespace app\controllers;

class Main extends \app\core\Controller{

    public function index(){
        //TODO: display ads using with POST
        //TODO: display products and filter it by newest
        $ads = new \app\models\Ads();
        $ads = $ads->getAll();
        $this->view('Main/index',['ads'=> $ads,]);
    }

    public function profile(){

        if (($_SESSION['role']) == 'buyer'){
            $profile = new \app\models\Profile();
            $buyer = new \app\models\Buyer();
            $profile = $profile->getProfileWithProfileId($_SESSION['profile_id']);
            $buyer = $buyer->getBuyerUsingProfileId($profile->profile_id);
            
            $this->view('Profile/profile', ['profile'=>$profile, 'buyer'=>$buyer, 'role'=>$profile->role]);
        } else{
            $profile = new \app\models\Profile();
            $profile = $profile->getProfileWithProfileId($_SESSION['profile_id']);
            $vendor = new \app\models\Vendor();
            $vendor = $vendor->getVendorUsingProfileId($profile->profile_id);
           
            $this->view('Profile/profile', ['profile'=>$profile, 'vendor'=>$vendor, 'role'=>$profile->role,]);
        }
        
    }
}
