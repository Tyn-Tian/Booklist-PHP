<?php

namespace BooklistPhp\Service;

use BooklistPhp\Config\Database;
use BooklistPhp\Exception\ValidationException;
use BooklistPhp\Model\AddBooklistRequest;
use BooklistPhp\Repository\BooklistRepository;
use PHPUnit\Framework\TestCase;

class BooklistServiceTest extends TestCase
{
    private \PDO $connection;
    private BooklistRepository $booklistRepository;
    private BooklistService $booklistService;

    protected function setUp(): void
    {
        $this->connection = Database::getConnection();
        $this->booklistRepository = new BooklistRepository($this->connection);
        $this->booklistService = new BooklistService($this->booklistRepository);

        $this->booklistRepository->deleteAll();
    }

    public function testAddBooklistSuccess()
    {
        $request = new AddBooklistRequest();
        $request->book = "Atomic Habits";

        $response = $this->booklistService->addBooklist($request);

        self::assertEquals($this->connection->lastInsertId(), $response->booklist->id);
        self::assertEquals($request->book, $response->booklist->book);
    }

    public function testAddBooklistFailed()
    {
        $request = new AddBooklistRequest();
        $request->book = "";

        $this->expectException(ValidationException::class);
        $this->booklistService->addBooklist($request);
    }
}