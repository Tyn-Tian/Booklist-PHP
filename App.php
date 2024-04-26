<?php


use Repository\BooklistRepositoryImpl;
use Service\BooklistServiceImpl;
use View\BooklistView;

require_once "./Repository/BooklistRepository.php";
require_once "./Service/BooklistService.php";
require_once "./View/BooklistView.php";
require_once "./Helper/InputHelper.php";
require_once "./Entity/Booklist.php";

echo "Aplikasi Booklist" . PHP_EOL;

$booklistRepository = new BooklistRepositoryImpl();
$booklistService = new BooklistServiceImpl($booklistRepository);
$booklistView = new BooklistView($booklistService);

$booklistView->showBooklist();