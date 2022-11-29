<?php
namespace app\controllers;

class Product extends \app\core\Controller {

    public function insert(){
        
        if (isset($_POST['action'])) {
            $product = new \app\models\Product();
            $vendor = new \app\models\Vendor();
            $vendor = $vendor->getVendorUsingProfileId($_SESSION['profile_id']);

            // $category = new \app\models\Category();
            // $prod_category = $category->get($_POST['product_category']+1);

            $product->prod_name = $_POST['product_name'];
            $product->prod_desc = $_POST['product_desc'];
            $product->prod_cost = $_POST['product_cost'];
            $product->num_of_stock = $_POST['stock'];
            $product->has_discount = 0;
            $filename = $this->saveFile($_FILES['product_image']);
            $product->product_image = $filename;
            $product->vendor_id = $vendor->vendor_id;
            $product->prod_cat_id = $_POST['product_category']+1;
            $product->insert();
            header('location:/Main/profile');
            
        } 
    }
}