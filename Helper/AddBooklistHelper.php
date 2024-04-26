<?php 

namespace Helper;

use Service\BooklistService;

class AddBooklistHelper
{
    static function addBooklist(BooklistService $booklistService): void 
    {
        $booklistService->addBooklist("Bejalar PHP");
        $booklistService->addBooklist("Bejalar PHP OOP");
        $booklistService->addBooklist("Bejalar PHP 8");
    }
}