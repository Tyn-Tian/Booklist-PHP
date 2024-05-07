<?php

function getDatabaseConfig()
{
    return [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost:3306;dbname=belajar_php_booklist_test",
                "username" => "root",
                "password" => ""
            ],
            "prod" => [
                "url" => "mysql:host=localhost:3306;dbname=belajar_php_booklist",
                "username" => "root",
                "password" => ""
            ]
        ]
    ];
}
