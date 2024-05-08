<?php

namespace BooklistPhp\Service;

use BooklistPhp\Config\Database;
use BooklistPhp\Domain\Booklist;
use BooklistPhp\Exception\ValidationException;
use BooklistPhp\Model\AddBooklistRequest;
use BooklistPhp\Model\AddBooklistResponse;
use BooklistPhp\Repository\BooklistRepository;

// interface BooklistServiceInterface
// {
//     function showBooklist(): void;

//     function addBooklist(string $book): void;

//     function removeBooklist(int $number): void;
// }

// class BooklistService implements BooklistServiceInterface
// {
//     public function __construct(
//         private BooklistRepository $booklistRepository
//     ) {
//     }

//     public function showBooklist(): void
//     {
//         echo "Booklist" . PHP_EOL;
//         $booklist = $this->booklistRepository->findAll();
//         foreach ($booklist as $number => $value) {
//             echo $value->getId(). ". " . $value->getBook() . PHP_EOL;
//         }
//     }

//     function addBooklist(string $book): void
//     {
//         $booklist = new Booklist($book);
//         $this->booklistRepository->save($booklist);
//         echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
//     }

//     function removeBooklist(int $number): void
//     {
//         echo $this->booklistRepository->remove($number) ? "SUKSES" : "GAGAL"; 
//         echo " MENGHAPUS BOOKLIST" . PHP_EOL;
//     }
// }

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
}
