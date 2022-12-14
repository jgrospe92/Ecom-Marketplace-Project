<?php

namespace app\models;

class Product extends \app\core\Model
{

    public function getAll()
    {
        $SQL = "SELECT * from product ORDER BY date_added DESC";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
        return $STMT->fetchAll();
    }

    public function getAds(){
        $SQL = "SELECT advertisement.* from advertisement inner join product on advertisement.prod_id =:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id'=>$this->prod_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Ads');
        return $STMT->fetch();
    }

    public function getPromotion(){
        $SQL = "SELECT promotion.* from promotion inner join product on promotion.prod_id =:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id'=>$this->prod_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Promotion');
        return $STMT->fetch();
    }

    public function get($prod_id)
    {
        $SQL = "SELECT * FROM product WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id' => $prod_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
        return $STMT->fetch();
    }

    public function getMyProducts($vendor_id){
        $SQL = "SELECT * FROM product WHERE vendor_id=:vendor_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_id' => $vendor_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
        return $STMT->fetchAll();
    }


    public function insert()
    {
        $SQL = "INSERT INTO product(prod_name, prod_desc, date_added, prod_cost, num_of_stock, has_discount, has_ads, product_image, vendor_id, prod_cat_id) VALUES (:prod_name, :prod_desc, :date_added, :prod_cost,
            :num_of_stock, :has_discount, :has_ads, :product_image, :vendor_id, :prod_cat_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(
            [
                'prod_name' => $this->prod_name,
                'prod_desc' => $this->prod_desc,
                'date_added' => $this->date_added,
                'prod_cost' => $this->prod_cost,
                'num_of_stock' => $this->num_of_stock,
                'has_discount' => $this->has_discount,
                'has_ads'=> $this->has_ads,
                'product_image' =>$this->product_image,
                'vendor_id' => $this->vendor_id,
                'prod_cat_id' => $this->prod_cat_id,
            ]
        );
        return self::$_connection->lastInsertId();
    }

    public function update()
    {
        $SQL = "UPDATE product SET prod_name=:prod_name, prod_desc=:prod_desc, prod_cost=:prod_cost,
            num_of_stock=:num_of_stock, has_discount=:has_discount, has_ads=:has_ads, product_image=:product_image, prod_cat_id=:prod_cat_id WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(
            [
                'prod_name' => $this->prod_name,
                'prod_desc' => $this->prod_desc,
                'prod_cost' => $this->prod_cost,
                'num_of_stock' => $this->num_of_stock,
                'has_discount' => $this->has_discount,
                'has_ads' => $this->has_ads,
                'product_image'=>$this->product_image,
                'prod_cat_id' => $this->prod_cat_id,
                'prod_id' => $this->prod_id,
            ]
        );
    }

    public function updateQty(){
        $SQL = "UPDATE product SET num_of_stock=:num_of_stock WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['num_of_stock'=>$this->num_of_stock,
                        'prod_id'=>$this->prod_id]);
    }
    

    public function delete(){
        $SQL = "DELETE FROM product WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id'=>$this->prod_id]);
    }

    
    public function hasDiscount(){
        $SQL = "UPDATE product SET has_discount=:has_discount WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id'=>$this->prod_id]);
    }

    public function hasAdsUpdate(){
        $SQL = "UPDATE product SET has_ads=:has_ads WHERE prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['has_ads'=>$this->has_ads,
                        'prod_id'=>$this->prod_id]);
    }
}
