<?php

namespace BooklistPhp\Controller;

use BooklistPhp\App\View;

class BooklistController
{
    public function index(): void
    {
        View::render("index", [
            "title" => "Booklist PHP"
        ]);
    }
}