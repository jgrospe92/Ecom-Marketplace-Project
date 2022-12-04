<?php 

namespace app\controllers;

class Buyer extends \app\core\Controller{

    public function wishlist($buyer_id){

        $buyer = new \app\models\Buyer();
        $buyer = $buyer->getBuyerByBuyerID($buyer_id);
        $wishlist = $buyer->buyerCheckWishlist($buyer->buyer_id);
        $this->view('Buyer/wishlist', $wishlist);
    }

    public function cart(){
        $order = new \app\models\Order();
        $buyer = new \app\models\Buyer();
        $buyer = $buyer->getBuyerUsingProfileId($_SESSION['profile_id']);
        $order = $order->getUnpaidOrder($buyer->buyer_id);

        $this->view('Buyer/cart',  $order);
    }

    public function addToCart($prod_id){
        $buyer = new \app\models\Buyer();
        $product = new \app\models\Product();
        $orderDetails = new \app\models\OrderDetails();

        $product = $product->get($prod_id);
        --$product->num_of_stock;
        // decrement QTY
        $product->updateQty();
        $buyer = $buyer->getBuyerUsingProfileId($_SESSION['profile_id']);
        
        $order = new \app\models\Order();
        if (!$order->getUnpaidOrder($buyer->buyer_id)) {
            $order->order_number = rand();
            $order->order_date = date("Y-m-d");
            $order->order_status = "unpaid";
            $order->buyer_id = $buyer->buyer_id;
            $order_id = $order->insert();

            $orderDetails->unit_price =  $product->prod_cost;
            $orderDetails->unit_discount = 0;
            $orderDetails->unit_qty = 1;
            $orderDetails->order_id = $order_id;
            $orderDetails->prod_id = $product->prod_id;
            $orderDetails->insert();

        } else {
            $order = $order->getUnpaidOrder($buyer->buyer_id);

            $orderDetails->unit_price =  $product->prod_cost;
            $orderDetails->unit_discount = 0;
            $orderDetails->unit_qty = 1;
            $orderDetails->order_id = $order->order_id;
            $orderDetails->prod_id = $product->prod_id;
            $orderDetails->insert();
        }

    }

    public function removeFromCart($prod_id){
        $order_details = new \app\models\OrderDetails();
        $product = new \app\models\Product();
        $order_details->delete($_GET['order_details_id']);

        // increment QTY
        $product = $product->get($prod_id);
        ++$product->num_of_stock;
        $product->updateQty();
    }
}
