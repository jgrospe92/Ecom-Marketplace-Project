<?php
namespace app\models;

class Promotion extends \app\core\Model {

   public function insert(){
    $SQL = "INSERT INTO promotion(promo_name, discount_percent, prod_id) VALUES (:promo_name, :discount_percent, :prod_id)";
    $STMT = self::$_connection->prepare($SQL);
    $STMT->execute(
        [
            'promo_name'=>$this->promo_name,
            'discount_percent'=>$this->discount_percent,
            'prod_id'=>$this->prod_id,
        ]);
   }

   public function update(){
    $SQL = "UPDATE promotion SET promo_name=:promo_name, discount_percent=:discount_percent, prod_id=:prod_id WHERE promo_id=:promo_id";
    $STMT = self::$_connection->prepare($SQL);
    $STMT->execute(
        [
            'promo_name'=>$this->promo_name,
            'discount_percent'=>$this->discount_percent,
            'prod_id'=>$this->prod_id,
            'promo_id'=>$this->promo_id,
        ]);
   }

   public function getAll(){
    $SQL = "SELECT * FROM promotion";
    $STMT = self::$_connection->prepare($SQL);
    $STMT->execute();
    $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Promotion');
    return $STMT->fetchAll();
   }

   public function getProduct(){
    $SQL = "SELECT * from product inner join promotion on product.prod_id =:prod_id";
    $STMT = self::$_connection->prepare($SQL);
    $STMT->execute(['prod_id'=>$this->prod_id]);
    $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
    return $STMT->fetch();
   }
} 