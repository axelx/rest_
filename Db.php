<?php


class Db
{
    protected $db;

    const DB_SERVER = "localhost";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB = "web-rest2";

    public function __construct()
    {
        $this->dbPDOConnect();                 // Initiate Database connection

    }


    private function dbPDOConnect(){

        $dsn = 'mysql:dbname='.self::DB.';host='.self::DB_SERVER;

        try {
            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }
}