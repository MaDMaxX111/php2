<?php

class Cart extends Model {
    protected static $table = 'basket';

    public static function addCart($data) {

        db::getInstance()->Query('INSERT INTO basket SET id_user=:id_user, session_id=:session_id, id_good=:id_good, price=:price',
            $data);

    }

    public function getInfo() {

        if (isset($_SESSION['id_user']) && $_SESSION['id_user']) {

            return db::getInstance()->Select(
                'SELECT *, SUM(price) as price, COUNT(id_good) as quantity FROM `basket` where id_user=:id_user GROUP BY id_good',
                ['id_user' => $_SESSION['id_user']]);

        } else {

            return db::getInstance()->Select(
                'SELECT *, SUM(price) as price, COUNT(id_good) as quantity FROM `basket` where session_id=:session_id GROUP BY id_good',
                ['session_id' => $_SESSION['session_id']]);

        }

    }

    public function clear() {

            db::getInstance()->Query(
                'DELETE FROM `basket` where id_user=:id_user',
                ['id_user' => $_SESSION['id_user']]);

    }

}