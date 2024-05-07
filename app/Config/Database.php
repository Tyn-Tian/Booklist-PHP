<?php

namespace Booklistphp\Config;

class Database
{
    private static \PDO $pdo;

    public static function getConnection(string $env = "test"): \PDO
    {
        if (self::$pdo == null) {
            $config = getDatabaseConfig();
            self::$pdo = new \PDO(
                $config['database'][$env]['url'],
                $config['database'][$env]['username'],
                $config['database'][$env]['password']
            );
        }

        return self::$pdo;
    }
}