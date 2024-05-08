<?php

namespace BooklistPhp\Controller;

require_once __DIR__ . "/../helper/helper.php";

use BooklistPhp\Config\Database;
use BooklistPhp\Repository\BooklistRepository;
use PHPUnit\Framework\TestCase;

class BooklistControllerTest extends TestCase
{
    private BooklistController $booklistController;
    private BooklistRepository $booklistRepository;

    protected function setUp(): void
    {
        $this->booklistRepository = new BooklistRepository(Database::getConnection());
        $this->booklistController = new BooklistController();

        $this->booklistRepository->deleteAll();
        putenv("mode=test");
    }

    public function testIndex()
    {
        $this->booklistController->index();

        $this->expectOutputRegex("[Booklist PHP]");
        $this->expectOutputRegex("[Add New Booklist]");
    }

    public function testAddBooklist()
    {
        $this->booklistController->addBooklist();

        $this->expectOutputRegex("[Add New Booklist]");
        $this->expectOutputRegex("[Form]");
        $this->expectOutputRegex("[Book Title]");
        $this->expectOutputRegex("[Add New Book]");
    }

    public function testPostAddBooklistSuccess()
    {
        $_POST['book'] = "Atomic Habits";

        $this->booklistController->postAddBooklist();

        $this->expectOutputRegex("[Location: /]");
    }

    public function testPostAddBooklistValidationError()
    {
        $_POST['book'] = "";

        $this->booklistController->postAddBooklist();

        $this->expectOutputRegex("[Book name cannot blank]");
        $this->expectOutputRegex("[Add New Booklist]");
        $this->expectOutputRegex("[Form]");
        $this->expectOutputRegex("[Book Title]");
        $this->expectOutputRegex("[Add New Book]");
    }
}