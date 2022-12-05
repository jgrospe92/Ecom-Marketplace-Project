<?php
namespace app\controllers;

class Vendor extends \app\core\Controller {
    #[\app\filters\Login]
    public function dashboard($vendor_id){
        $this->view('Vendor/dashboard');
    }

}

