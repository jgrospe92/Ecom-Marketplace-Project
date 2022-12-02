<?php

namespace app\models;

class Buyer extends \app\core\Model
{
    public function getBuyerByBuyerID($buyer_id)
    {
        $SQL = "SELECT * FROM buyer WHERE buyer_id=:buyer_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['buyer_id' => $buyer_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Buyer');
        return $STMT->fetch();
    }

    public function getBuyerUsingProfileId($profile_id)
    {
        $SQL = "SELECT * FROM buyer WHERE profile_id=:profile_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Buyer');
        return $STMT->fetch();
    }

    public function insert() {

        $SQL = "INSERT INTO buyer(shipping_add, billing_add, credit, profile_id)
            VALUES(:shipping_add, :billing_add, :credit, :profile_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['shipping_add'=>$this->shipping_add,
                        'billing_add'=>$this->billing_add,
                        'credit'=>$this->credit,
                        'profile_id'=>$this->profile_id]);
        return self::$_connection->lastInsertId();
    }

    public function updateWallet() {
        $SQL = "UPDATE buyer SET credit=:credit WHERE buyer_id=:buyer_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['credit'=>$this->credit,
                        'buyer_id'=>$this->buyer_id]);
    }

    public function updateBuyer(){
        $SQL = "UPDATE buyer SET shipping_add=:shipping_add, billing_add=:billing_add WHERE buyer_id=:buyer_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['shipping_add'=>$this->shipping_add,
                        'billing_add'=>$this->billing_add,
                        'buyer_id'=>$this->buyer_id]);
    }

    // Check if buyer has a wishlist
    public function buyerCheckWishlist(){
        $SQL = "SELECT wishlist.* from wishlist INNER JOIN buyer ON wishlist.buyer_id =:buyer_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['buyer_id'=>$this->buyer_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Wishlist');
        return $STMT->fetchAll();
        
    }

    // public function getMyWishlistProducts(){
    //     $SQL = "SELECT wishlist.date_added, product.* from wishlist INNER JOIN product ON wishlist.prod_id =:prod_id";
    //     $STMT = self::$_connection->prepare($SQL);
    //     $STMT->execute(['prod_id'=>$this->prod_id]);
    //     $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
    //     return $STMT->fetchAll();
        
    // }

}
