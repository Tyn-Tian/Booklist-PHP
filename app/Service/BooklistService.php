<?php

namespace BooklistPhp\Service;

use BooklistPhp\Config\Database;
use BooklistPhp\Domain\Booklist;
use BooklistPhp\Exception\ValidationException;
use BooklistPhp\Model\AddBooklistRequest;
use BooklistPhp\Model\AddBooklistResponse;
use BooklistPhp\Repository\BooklistRepository;

class BooklistService
{
    private \PDO $connection;

    public function __construct(
        private BooklistRepository $booklistRepository
    ) {
        $this->connection = Database::getConnection();
    }

    public function addBooklist(AddBooklistRequest $request): ?AddBooklistResponse
    {
        $this->validateAddBooklistRequest($request);

        try {
            Database::beginTransaction();
            $booklist = new Booklist();
            $booklist->book = $request->book;

            $this->booklistRepository->save($booklist);
            $booklist->id = $this->connection->lastInsertId();

            $response = new AddBooklistResponse();
            $response->booklist = $booklist;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateAddBooklistRequest(AddBooklistRequest $request)
    {
        if ($request->book == null || trim($request->book) == "") {
            throw new ValidationException("Book name cannot blank");
        }
    }

    public function showBooklist(): array
    {
        return $this->booklistRepository->findAll();
    }

    public function deleteBooklist(string $id): bool
    {
        return $this->booklistRepository->remove($id);
    }
}
