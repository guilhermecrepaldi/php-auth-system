<?php
class Database {
    private static ?PDO $instance = null;
    
    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $config = require __DIR__ . "/../config/database.php";
            self::$instance = new PDO(
                "mysql:host={$config["host"]};dbname={$config["dbname"]};charset=utf8mb4",
                $config["user"],
                $config["pass"],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }
        return self::$instance;
    }
}
