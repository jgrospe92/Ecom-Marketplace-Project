<?php 

namespace app\controllers {

    class Main extends \app\core\Controller{

        public function index(){
            //TODO: display ads using with POST
            //TODO: display products and filter it by newest
            $this->view('Main/index');
        }

        public function profile(){

            if (isset($_SESSION['role']) == 'buyer'){
                $profile = new \app\models\Profile();
                $buyer = new \app\models\Buyer();
                $profile = $profile->getProfileWithProfileId($_SESSION['profile_id']);
                $buyer = $buyer->getBuyerUsingProfileId($profile->profile_id);
                
                $this->view('Profile/profile', ['profile'=>$profile, 'buyer'=>$buyer, 'role'=>$profile->role]);
            }
           
        }
    }
}