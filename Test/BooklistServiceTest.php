<?php

require_once "./Entity/Booklist.php";
require_once "./Repository/BooklistRepository.php";
require_once "./Service/BooklistService.php";
require_once "./Helper/AddBooklistHelper.php";
require_once "./Config/Database.php";

use Entity\Booklist;
use Repository\BooklistRepositoryImpl;
use Service\BooklistServiceImpl;
use Helper\AddBooklistHelper;

function testShowBooklist(): void
{
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);
    $booklistService = new BooklistServiceImpl($booklistRepository);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
}

function testAddBooklist(): void 
{
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);

    $booklistService = new BooklistServiceImpl($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
}

function testRemoveBooklist(): void 
{
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);

    $booklistService = new BooklistServiceImpl($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
    $booklistService->removeBooklist(2);
    $booklistService->removeBooklist(4);
    $booklistService->showBooklist();
}