<?php 

namespace app\controllers {

    class Main extends \app\core\Controller{

        public function index(){
            //TODO: display ads using with POST
            //TODO: display products and filter it by newest
            $this->view('Main/index');
        }
    }
}