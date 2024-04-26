<?php

namespace Entity;

class Booklist
{
    private int $id;

    public function __construct(
        private string $book = ""
    ) {
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBook(): string
    {
        return $this->book;
    }

    public function setBook(string $book): void
    {
        $this->book = $book;
    }
}