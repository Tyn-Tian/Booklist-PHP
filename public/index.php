<?php

use BooklistPhp\App\Router;
use BooklistPhp\Config\Database;
use BooklistPhp\Controller\BooklistController;

require_once __DIR__ . "/../vendor/autoload.php";

Database::getConnection("prod");

Router::add('GET', '/', BooklistController::class, 'index', []);

Router::run();