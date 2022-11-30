<?php 

namespace app\controllers;

class Buyer extends \app\core\Controller{

    public function wishlist($buyer_id){

        $buyer = new \app\models\Buyer();
        $buyer = $buyer->getBuyerByBuyerID($buyer_id);
        $wishlist = $buyer->buyerCheckWishlist();
        
        $this->view('Buyer/wishlist', $wishlist);
    }
}
