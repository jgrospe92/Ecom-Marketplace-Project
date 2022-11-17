<?php

namespace app\models;

class Vendor extends \app\core\Model
{

    public function get()
    {
        $SQL = "SELECT * FROM profile WHERE user_id=:user_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id' => $this->user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
        return $STMT->fetch();
    }

    public function insert() {

        $SQL = "INSERT INTO vendor(vendor_name, vendor_profit, vendor_desc, vendor_location, profile_id)
            VALUES(:vendor_name, :vendor_profit, :vendor_desc, :vendor_location, :profile_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_name'=>$this->vendor_name,
                        'vendor_profit'=>$this->vendor_profit,
                        'vendor_desc'=>$this->vendor_desc,
                        'vendor_location'=>$this->vendor_location,
                        'profile_id'=>$this->profile_id]);
        return self::$_connection->lastInsertId();
    }

    public function checkVendorName(){
        $SQL = "SELECT * FROM vendor where vendor_name = :vendor_name";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_name'=>$this->vendor_name]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
        return $STMT->fetch();
    }
}
