<?php
namespace app\controllers;

class Product extends \app\core\Controller {

    public function insert(){
        
        if (isset($_POST['action'])) {
            $product = new \app\models\Product();
            $vendor = new \app\models\Vendor();
            $ads = new \app\models\Ads();
            $vendor = $vendor->getVendorUsingProfileId($_SESSION['profile_id']);

            // $category = new \app\models\Category();
            // $prod_category = $category->get($_POST['product_category']+1);

            $product->prod_name = $_POST['product_name'];
            $product->prod_desc = $_POST['product_desc'];
            $product->prod_cost = $_POST['product_cost'];
            $product->date_added = date("Y-m-d h:i:s");
            $product->num_of_stock = $_POST['stock'];
            $product->has_discount = 0;
            if (isset($_POST['has_ads'])== 'on'){  
                $product->has_ads = 1;
                $ads->start_date = $_POST['startDate'];
                $ads->end_date = $_POST['endDate'];
                $ads->description = "Hot Picks!";
            } else {
                $product->has_ads = 0;
                $ads->start_date = "";
                $ads->end_date = "";
            }
            $filename = $this->saveFile($_FILES['product_image']);
            $product->product_image = $filename;
            $product->vendor_id = $vendor->vendor_id;
            $product->prod_cat_id = $_POST['product_category']+1;
            $recentProdID = $product->insert();
            if ($recentProdID > 0 && isset($_POST['has_ads'])== 'on') {
                $ads->prod_id = $recentProdID;
                $ads->insert();
            }
            header('location:/Main/profile');

            // FOR DATE FUNCTIONS
            // $d = strtotime("+3 Months");
            // $Next3Months = date("Y-m-d", $d);
            // $currentDate = date("Y-m-d");
            // $newDate = date_diff(date_create($Next3Months),date_create($currentDate), true);
            // echo  $newDate->format("%R%a days");
            
        } 
    }

    public function update($prod_id){

        if (isset($_POST['update'])) {
            $product = new \app\models\Product();
            $ads = new \app\models\Ads();
            $promotion = new \app\models\Promotion();

            $product =  $product->get($prod_id);
            $hasAds = false;
            $hasPromos = false;
            if ($product->getAds()) {
                $ads =  $product->getAds();
                $hasAds = true;
            }

            if ($product->getPromotion()){
                $promotion = $product->getPromotion();
                $hasPromos = true;
            }
            
            $product->prod_name = $_POST['product_name'];
            $product->prod_desc = $_POST['product_desc'];
            $product->prod_cost = $_POST['product_cost'];
            $product->date_added = date("Y-m-d h:i:s");
            $product->num_of_stock = $_POST['stock'];
            
            // ADS
            if (isset($_POST['has_ads'])== 'on'){  
                $product->has_ads = 1;
                $ads->start_date = $_POST['startDate'];
                $ads->end_date = $_POST['endDate'];
                $ads->prod_id = $product->prod_id;
                $ads->description = "Hot Picks!";
                if ($hasAds) {
                    $ads->update();
                } else {
                    $ads->insert();
                }
            } else {
                $product->has_ads = 0;
                $ads->start_date = "";
                $ads->end_date = "";
                $ads->description = "";

                if ($hasAds) {
                    $ads->update();
                } 
            }

            if (isset($_POST['has_discount']) == "on") {
                $product->has_discount = 1;
                $promotion->promo_name = $_POST['promotion_name'];
                $promotion->discount_percent = $_POST['promotion_percent'];
                $promotion->prod_id = $product->prod_id;

                if ($hasPromos) {
                    $promotion->update();
                } else {
                    $promotion->insert();
                }

            } else {
                $product->has_discount = 0;
                $promotion->promo_name = "";
                $promotion->discount_percent = 0;
                if ($hasPromos) {
                    $promotion->update();
                }
            }

            $filename = $this->saveFile($_FILES['product_image']);
            unlink("images/$product->product_image");
            $product->product_image = $filename;
            $product->prod_cat_id = $_POST['product_category']+1;
            $product->update();

            if ($product->getPromotion()){
                $promotion->update();
            } else {
                $promotion->insert();
            }

            header('location:/Main/profile');

            // FOR DATE FUNCTIONS
            // $d = strtotime("+3 Months");
            // $Next3Months = date("Y-m-d", $d);
            // $currentDate = date("Y-m-d");
            // $newDate = date_diff(date_create($Next3Months),date_create($currentDate), true);
            // echo  $newDate->format("%R%a days");
            
        } 

    }

    public function delete($prod_id){
        $vendor = new \app\models\Vendor();
        $vendor = $vendor->getVendorUsingProfileId($_SESSION['profile_id']);

        $product = new \app\models\Product();
        $product =   $product->get($prod_id);
        if ($vendor->vendor_id == $product->vendor_id){
            unlink("images/$product->product_image");
            $product->delete();
        }
        header('location:/Main/index');
    
    }

    public function details($prod_id) {
        $product = new \app\models\Product();
        $product =   $product->get($prod_id);
      
        echo $this->view('/includes/subview/productDetail', $product);
    
    }

    public function showEditProduct($prod_id) {
        $product = new \app\models\Product();
        $product =   $product->get($prod_id);
        $categories = new \app\models\Category();
        $categories = $categories->getAll();
      
        echo $this->view('/includes/subview/editProduct', ['product'=>$product, 'categories'=>$categories]);
    }
}