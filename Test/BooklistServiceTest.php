<?php

require_once "./vendor/autoload.php";

use BooklistPhp\Config\Database;
use BooklistPhp\Repository\BooklistRepository;
use BooklistPhp\Service\BooklistService;
use BooklistPhp\Helper\AddBooklistHelper;

function testShowBooklist(): void
{
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);
    $booklistService = new BooklistService($booklistRepository);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
}

function testAddBooklist(): void 
{
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);

    $booklistService = new BooklistService($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
}

function testRemoveBooklist(): void 
{
    $connection = Database::getConnection();
    $booklistRepository = new BooklistRepository($connection);

    $booklistService = new BooklistService($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
    $booklistService->removeBooklist(2);
    $booklistService->removeBooklist(4);
    $booklistService->showBooklist();
}