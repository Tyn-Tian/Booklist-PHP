<?php

require_once "./vendor/autoload.php";

use BooklistPhp\Config\Database;
use BooklistPhp\Repository\BooklistRepository;
use BooklistPhp\Service\BooklistService;
use BooklistPhp\View\BooklistView;
use BooklistPhp\Helper\AddBooklistHelper;

function testViewShowBooklist(): void
{   
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);
    $booklistService = new BooklistService($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistView->showBooklist();
}

function testViewAddBooklist(): void
{
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);
    $booklistService = new BooklistService($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
    
    $booklistView->addBooklist();

    $booklistService->showBooklist();
}

function testViewRemoveBooklist(): void 
{
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);
    $booklistService = new BooklistService($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();

    $booklistView->removeBooklist();

    $booklistService->showBooklist();
}