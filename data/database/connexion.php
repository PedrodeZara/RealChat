<?php

class Database {
    private static $pdo;

    public static function getConnection() {
        if (self::$pdo == null) {
            $host = getenv("DB_HOST");
            $dbname = getenv("DB_NAME");
            $user = getenv("DB_USER");
            $pass = getenv("DB_PASSWORD");
            $port = getenv("DB_PORT");

            try {
                self::$pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;",$user,$pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            catch (PDOException $ex) {
                echo $ex;
            }
        }
        return self::$pdo;
    }
}