<?php

namespace app\models;

class Vendor extends \app\core\Model
{

    public function get()
    {
        $SQL = "SELECT * FROM profile WHERE user_id=:user_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id' => $this->user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Vendor');
        return $STMT->fetch();
    }

    public function getVendorByID($vendor_id){
        $SQL = "SELECT * FROM vendor WHERE vendor_id=:vendor_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_id' => $vendor_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Vendor');
        return $STMT->fetch();
    }

    public function getVendorUsingProfileId($profile_id)
    {
        $SQL = "SELECT * FROM vendor WHERE profile_id=:profile_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['profile_id' => $profile_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Vendor');
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
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Vendor');
        return $STMT->fetch();
    }

    public function updateVendor(){
        $SQL = "UPDATE vendor SET vendor_name=:vendor_name, vendor_desc=:vendor_desc, vendor_location=:vendor_location WHERE profile_id=:profile_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_name'=>$this->vendor_name,
                        'vendor_desc'=>$this->vendor_desc,
                        'vendor_location'=>$this->vendor_location,
                        'profile_id'=>$this->profile_id]);
    }

    public function updateWallet() {
        $SQL = "UPDATE vendor SET vendor_profit=:vendor_profit WHERE vendor_id=:vendor_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['vendor_profit'=>$this->vendor_profit,
                        'vendor_id'=>$this->vendor_id]);
    }
}
