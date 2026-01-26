<?php

class Database {
    private static $pdo;

    public static function getConnection() {
        if (self::$pdo == null) {
            $host = "mysql";
            $dbname = "RealChat";
            $user = "root";
            $pass = "root";

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8;",$user,$pass);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo json_encode(["Sucesso" => "Conectado"]);
            }

            catch (PDOException $ex) {
                echo ex;
            }
        }
        return self::$pdo;
    }
}