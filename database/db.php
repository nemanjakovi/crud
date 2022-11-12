<?php
class Database
{

    public function connect()
    {
        try {
            $db_user = "root";
            $db_pass = "";
            $dbh = new PDO("mysql:host=localhost;dbname=Library;", $db_user, $db_pass);
            return $dbh;
        } catch (PDOException $e) {
            echo "Connection error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
