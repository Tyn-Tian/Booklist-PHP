<?php

require_once "./vendor/autoload.php";

use BooklistPhp\Config\Database;
use BooklistPhp\Repository\BooklistRepository;
use BooklistPhp\Service\BooklistService;
use BooklistPhp\View\BooklistView;

echo "Aplikasi Booklist" . PHP_EOL;

$connection = Database::getConnection();
$booklistRepository = new BooklistRepository($connection);
$booklistService = new BooklistService($booklistRepository);
$booklistView = new BooklistView($booklistService);

$booklistView->showBooklist();