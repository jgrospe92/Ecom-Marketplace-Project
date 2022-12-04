<?php
namespace app\core;


class Helper{


    public static function disableButtons(){
        $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' ? "" : "disabled") : "disabled"; return $active;  

    }

    public static function disableAddToCartButtons($prod_id){
        $product = new \app\models\Product();
        $product = $product->get($prod_id);

        $active = isset($_SESSION['role']) ? ($_SESSION['role'] == 'buyer' && $product->num_of_stock > 0  ? "" : "disabled") : "disabled"; return $active;  

    }

    public static function clearFavoriteIcon($prod_id, $buyer_id){
        $wishlist = new \app\models\Wishlist();
    
        if (isset($_SESSION['role']) && $_SESSION['role'] == "buyer") {
            $status =  $wishlist->checkInkWishList($prod_id, $buyer_id) ? "class='bi bi-heart-fill'" : "class='bi bi-heart'";
        } else {
            $status = "class='bi bi-heart'";
        }
        return $status;

       
    }

    public static function checkAdsEndDate($ads, $prod){
        $ad = $ads;
        $product = $prod;
        if($product->has_ads > 0) {
            $newDate = date_diff(date_create(date("Y-m-d")),date_create($ad->end_date), true);
            return true;
        } else {
            return false;
        }

    }

    public static function verifyPromoDate(){
        $promoCHK = new \app\models\Ads();
        $prodHelper = new \app\models\Product();
        $promoCHK = $promoCHK->checkForExpiredPromo();
        foreach( $promoCHK as $ad) {
            $endDate =  $ad->checkAdsEndDate($ad->ads_id);
            if ($endDate == 0) {
                $productToUpdate =   $prodHelper->get($ad->prod_id);
                $productToUpdate->has_ads = 0;
                $productToUpdate->hasAdsUpdate();
                $ad->delete();
            }
        }
    }
}