<?php
namespace app\core;


class Helper{

    public static function disableButtons(){

        $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' ? "" : "disabled") : "disabled"; return $active;  

    }

    public static function clearFavoriteIcon($prod_id){
        $wishlist = new \app\models\Wishlist();
    
        if (isset($_SESSION['role']) && $_SESSION['role'] == "buyer") {
            $status =  $wishlist->checkInkWishList($prod_id) ? "class='bi bi-heart-fill'" : "class='bi bi-heart'";
        } else {
            $status = "class='bi bi-heart'";
        }
        return $status;

       
    }
    
}