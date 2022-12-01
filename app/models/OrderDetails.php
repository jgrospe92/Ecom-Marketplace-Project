<?php
namespace app\models;

class OrderDetails extends \app\core\Model {

    public function getAll($order_id){
        $SQL = "SELECT * FROM order_details WHERE order_id=:order_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['order_id'=>$order_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\OrderDetails');
        return $STMT->fetchAll();

    }

    public function insert(){
        $SQL = "INSERT INTO order_details(unit_price, unit_discount, unit_qty, order_id, prod_id)
            VALUES (:unit_price, :unit_discount, :unit_qty, :order_id, :prod_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([
            'unit_price'=>$this->unit_price,
            'unit_discount'=>$this->unit_discount,
            'unit_qty'=>$this->unit_qty,
            'order_id'=>$this->order_id,
            'prod_id'=>$this->prod_id,
        ]);

    }
}