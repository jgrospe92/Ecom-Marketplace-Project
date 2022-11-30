<?php 
namespace app\models;

class Ads extends \app\core\Model {

    public function getAll(){
        $SQL = "SELECT * from advertisement WHERE `start_date` <= end_date";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Ads');
        return $STMT->fetchAll();
    }


    public function insert(){
        $SQL = "INSERT INTO advertisement(description, start_date, end_date, prod_id) VALUES (:description, :start_date, :end_date, :prod_id )";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['description'=>$this->description,
                        'start_date'=>$this->start_date,
                        'end_date'=>$this->end_date,
                        'prod_id'=>$this->prod_id]);
    }

    public function getProduct(){
        $SQL = "SELECT * from product inner join advertisement on product.prod_id =:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_id'=>$this->prod_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Product');
        return $STMT->fetch();
    }

    public function update(){
        $SQL = "UPDATE advertisement SET description=:description, start_date=:start_date, end_date=:end_date WHERE ads_id=:ads_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([
            'description'=>$this->description,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'ads_id'=>$this->ads_id,
        ]);
    }

    public function get(){
        $SQL = "SELECT * from advertisement WHERE ads_id=:ads_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['ads_id'=>$this->ads_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Ads');
        return $STMT->fetch();

    }
}