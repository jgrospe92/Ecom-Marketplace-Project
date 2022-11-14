<?php
namespace app\models;

class Profile extends \app\core\Model {

    public function get() {
        $SQL = "SELECT * FROM profile WHERE user_id=:user_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id'=>$this->user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
        return $STMT->fetch();
    }

    public function insert(){
        $SQL = "INSERT INTO profile(first_name, last_name, role, profile_photo, user_id) VALUES (:first_name, :last_name, :role, :profile_photo, :user_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(
            [
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'role'=>$this->role,
                'profile_photo'=>$this->profile_photo,
                'user_id'=>$this->user_id,

            ]
            );
        return self::$_connection->lastInsertId();
    }

}