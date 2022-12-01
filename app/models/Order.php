<?php
namespace app\models;

class Order extends \app\core\Model {

    public function getUnpaidOrder($buyer_id){
        $SQL = "SELECT * from `order` WHERE buyer_id=:buyer_id AND order_status = 'unpaid'";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['buyer_id'=>$buyer_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Order');
        return $STMT->fetch();
    }


    public function insert(){
        $SQL = "INSERT INTO `order`(order_number, order_date, order_status, buyer_id)
            VALUES(:order_number, :order_date, :order_status, :buyer_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([
                        'order_number'=>$this->order_number,
                        'order_date'=>$this->order_date,
                        'order_status'=>$this->order_status,
                        'buyer_id'=>$this->buyer_id,
                    ]);
        return self::$_connection->lastInsertId();
    }
    
}