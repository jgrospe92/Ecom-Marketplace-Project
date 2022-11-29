<?php
namespace app\models;

class Category extends \app\core\Model {

    public function getAll(){
        $SQL = "SELECT * FROM prod_category";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
    }
    public function get($prod_cat_id){
        $SQL = "SELECT * FROM category WHERE prod_cat_id=:prod_cat_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['prod_cat_id'=>$prod_cat_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
    }
}