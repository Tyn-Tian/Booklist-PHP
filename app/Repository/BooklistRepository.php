<?php

namespace BooklistPhp\Repository;

// use BooklistPhp\Entity\Booklist;

// interface BooklistRepositoryInterface
// {
//     function findAll(): array;

//     function save(Booklist $booklist): void;

//     function remove(int $number): bool;
// }

// class BooklistRepository implements BooklistRepositoryInterface
// {
//     public array $booklist = array();

//     public function __construct(
//         private \PDO $connection
//     ) {
//     }

//     public function findAll(): array
//     {
//         $sql = "SELECT id, book FROM booklist";
//         $result = $this->connection->prepare($sql);
//         $result->execute();

//         $resultArray = [];

//         foreach ($result as $row) {
//             $booklist = new Booklist();
//             $booklist->setId($row['id']);
//             $booklist->setBook($row['book']);

//             $resultArray[] = $booklist;
//         }

//         return $resultArray;
//     }

//     public function save(Booklist $booklist): void
//     {
//         $sql = "INSERT INTO booklist(book) VALUES (?)";
//         $result = $this->connection->prepare($sql);
//         $result->execute([$booklist->getBook()]);
//     }

//     public function remove(int $number): bool
//     {
//         $sql = "SELECT id FROM booklist WHERE id = ?";
//         $result = $this->connection->prepare($sql);
//         $result->execute([$number]);

//         if ($result->fetch()) {
//             $sql = "DELETE FROM booklist WHERE id = ?";
//             $result = $this->connection->prepare($sql);
//             $result->execute([$number]);
//             return true;
//         } else {
//             return false;
//         }
//     }
// }

use BooklistPhp\Domain\Booklist;

class BooklistRepository
{
    public function __construct(
        private \PDO $connection
    )
    {
    }

    public function save(Booklist $booklist): void
    {
        $statement = $this->connection->prepare("INSERT INTO booklist(book) VALUES (?)");
        $statement->execute([$booklist->book]);
    }

    public function findById(string $id): ?Booklist
    {
        $statement = $this->connection->prepare("SELECT id, book FROM booklist WHERE id = ?");
        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $booklist = new Booklist();
                $booklist->id = $row['id'];
                $booklist->book = $row['book'];
                return $booklist;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll() 
    {
        $this->connection->exec("DELETE FROM booklist");
    }
}
