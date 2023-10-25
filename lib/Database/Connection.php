<?php

abstract class Connection
{
    private static $conn;

    public static function getConn()
    {
        $config = require_once(__DIR__ . '/config.php');
        if (self::$conn == null) {
            self::$conn = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'], $config['db_user'], $config['db_password']);
        }

        return self::$conn;
    }
}
