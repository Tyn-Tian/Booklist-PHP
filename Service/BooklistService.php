<?php

namespace Service;

use Entity\Booklist;
use Repository\BooklistRepository;

interface BooklistService
{
    function showBooklist(): void;

    function addBooklist(string $book): void;

    function removeBooklist(int $number): void;
}

class BooklistServiceImpl implements BooklistService
{
    public function __construct(
        private BooklistRepository $booklistRepository
    ) {
    }

    public function showBooklist(): void
    {
        echo "Booklist" . PHP_EOL;
        $booklist = $this->booklistRepository->findAll();
        foreach ($booklist as $number => $value) {
            echo $value->getId(). ". " . $value->getBook() . PHP_EOL;
        }
    }

    function addBooklist(string $book): void
    {
        $booklist = new Booklist($book);
        $this->booklistRepository->save($booklist);
        echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
    }

    function removeBooklist(int $number): void
    {
        echo $this->booklistRepository->remove($number) ? "SUKSES" : "GAGAL"; 
        echo " MENGHAPUS BOOKLIST" . PHP_EOL;
    }
}