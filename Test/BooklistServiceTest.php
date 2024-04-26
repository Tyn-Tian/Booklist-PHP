<?php

require_once "./Entity/Booklist.php";
require_once "./Repository/BooklistRepository.php";
require_once "./Service/BooklistService.php";
require_once "./Helper/AddBooklistHelper.php";

use Entity\Booklist;
use Repository\BooklistRepositoryImpl;
use Service\BooklistServiceImpl;
use Helper\AddBooklistHelper;

function testShowBooklist(): void
{
    $booklistRepository = new BooklistRepositoryImpl();
    $booklistRepository->booklist[1] = new Booklist("Belajar PHP");
    $booklistRepository->booklist[2] = new Booklist("Belajar PHP OOP");
    $booklistRepository->booklist[3] = new Booklist("Belajar PHP 8");

    $booklistService = new BooklistServiceImpl($booklistRepository);

    $booklistService->showBooklist();
}

function testAddBooklist(): void 
{
    $booklistRepository = new BooklistRepositoryImpl();

    $booklistService = new BooklistServiceImpl($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
}

function testRemoveBooklist(): void 
{
    $booklistRepository = new BooklistRepositoryImpl();

    $booklistService = new BooklistServiceImpl($booklistRepository);
    AddBooklistHelper::addBooklist($booklistService);

    $booklistService->showBooklist();
    $booklistService->removeBooklist(2);
    $booklistService->removeBooklist(4);
    $booklistService->showBooklist();
}