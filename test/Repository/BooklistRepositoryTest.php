<?php

namespace BooklistPhp\Repository;

use BooklistPhp\Config\Database;
use BooklistPhp\Domain\Booklist;
use PHPUnit\Framework\TestCase;

class BooklistRepositoryTest extends TestCase
{
    private BooklistRepository $booklistRepository;
    private \PDO $connection;

    protected function setUp(): void
    {
        $this->connection = Database::getConnection();
        $this->booklistRepository = new BooklistRepository($this->connection);
        $this->booklistRepository->deleteAll();
    }

    public function testAddBooklistSuccess()
    {
        $booklist = new Booklist();
        $booklist->book = "Atomic Habits";

        $this->booklistRepository->save($booklist);

        $result = $this->booklistRepository->findById($this->connection->lastInsertId());

        self::assertNotNull($result);
        self::assertEquals($booklist->book, $result->book);
    }

    public function testFindByIdNotFound() 
    {
        $result = $this->booklistRepository->findById("Empty");
        self::assertNull($result);
    }
}