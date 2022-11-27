<?php 

namespace app\controllers {

    class Buyer extends \app\core\Controller{

        public function wishlist($buyer_id){

            $buyer = new \app\models\Buyer();
            $buyer = $buyer->getBuyerByBuyerID($buyer_id);
            $wishlist = $buyer->checkWishlist();
            var_dump($wishlist);
            $this->view('Buyer/wishlist');
        }
    }
}