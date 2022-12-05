<?php

namespace app\models;

class Wishlist extends \app\core\Model
{

    public function get()
    {
        $SQL = "SELECT * FROM wishlist WHERE wishlist_id=:wishlist_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['wishlist_id' => $this->wishlist_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Wishlist');
        return $STMT->fetchAll();
    }

    public function getAll()
    {
        $SQL = "SELECT * FROM wishlist";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Wishlist');
        return $STMT->fetchAll();
    }

    public function insert()
    {
        $SQL = "INSERT INTO wishlist(buyer_id, date_added, prod_id) VALUES (:buyer_id, :date_added, :prod_id)";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([
            "buyer_id" => $this->buyer_id,
            "date_added" => $this->date_added,
            "prod_id" => $this->prod_id,
        ]);
    }

    public function delete()
    {
        $SQL = "DELETE FROM wishlist WHERE buyer_id=:buyer_id AND prod_id=:prod_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute([
            'buyer_id' => $this->buyer_id,
            'prod_id' => $this->prod_id
        ]);
    }

    // CHeck if product is in wishlist
    public function checkInkWishList($prod_id, $buyer_id)
    {
        $SQL = "SELECT * from wishlist WHERE prod_id=:prod_id AND buyer_id=:buyer_id";
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(
            [
                'prod_id' => $prod_id,
                'buyer_id' => $buyer_id,
            ]
        );
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Wishlist');
        return $STMT->fetch();
    }
}
