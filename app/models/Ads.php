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
}