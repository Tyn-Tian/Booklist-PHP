<?php

use Repository\BooklistRepositoryImpl;
use Service\BooklistServiceImpl;
use View\BooklistView;
use Helper\AddBooklistHelper;

require_once "./Entity/Booklist.php";
require_once "./Repository/BooklistRepository.php";
require_once "./Service/BooklistService.php";
require_once "./View/BooklistView.php";
require_once "./Helper/InputHelper.php";
require_once "./Helper/AddBooklistHelper.php";
require_once "./Config/Database.php";

function testViewShowBooklist(): void
{   
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);
    $booklistService = new BooklistServiceImpl($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistView->showBooklist();
}

function testViewAddBooklist(): void
{
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);
    $booklistService = new BooklistServiceImpl($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
    
    $booklistView->addBooklist();

    $booklistService->showBooklist();
}

function testViewRemoveBooklist(): void 
{
    $connection = \Config\Database::getConnection();
    $booklistRepository = new BooklistRepositoryImpl($connection);
    $booklistService = new BooklistServiceImpl($booklistRepository);
    $booklistView = new BooklistView($booklistService);

    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();

    $booklistView->removeBooklist();

    $booklistService->showBooklist();
}