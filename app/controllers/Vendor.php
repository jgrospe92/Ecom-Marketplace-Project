<?php
namespace app\controllers;

class Vendor extends \app\core\Controller {

    public function dashboard($vendor_id){
        $this->view('Vendor/dashboard');
    }

}

