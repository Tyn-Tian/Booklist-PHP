<?php

namespace BooklistPhp\Controller;

use PHPUnit\Framework\TestCase;

class BooklistControllerTest extends TestCase
{
    private BooklistController $booklistController;

    protected function setUp(): void
    {
        $this->booklistController = new BooklistController();
    }

    public function testIndex()
    {
        $this->booklistController->index();

        $this->expectOutputRegex("[Booklist PHP]");
        $this->expectOutputRegex("[Add New Booklist]");
    }
}