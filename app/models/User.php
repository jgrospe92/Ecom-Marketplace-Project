<?php
namespace app\models;

class User extends \app\core\Model
{
    // NOTE: GET THE USER USING USER NAME
    public function get($username)
    {
        $SQL = "SELECT * FROM user WHERE username = :username";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['username'=>$username]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
        return $STMT->fetch();
    }

    public function getUserByID($user_id)
    {
        $SQL = "SELECT * FROM user WHERE user_id = :user_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id'=>$user_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\User');
        return $STMT->fetch();
    }

    // NOTE: REGISTER ACCOUNT
    public function insert()
    {
        $SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash )";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['username'=>$this->username,
                        'password_hash'=>$this->password_hash]);
        return self::$_connection->lastInsertId();
    }

    // NOTE: UPDATE PASSWORD
    public function updatePassword()
    {
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}

    // NOTE: DELETE USER
    public function delete()
    {
        $SQL = "DELETE FROM user WHERE user_id=:user_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['user_id'=>$this->user_id]);
    }

    
}


