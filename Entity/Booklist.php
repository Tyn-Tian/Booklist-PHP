<?php

namespace Entity;

class Booklist
{
    public function __construct(
        private string $book = ""
    ) {
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