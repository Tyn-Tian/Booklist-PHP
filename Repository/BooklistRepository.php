<?php

namespace Repository;

use Entity\Booklist;

interface BooklistRepository
{
    function findAll(): array;

    function save(Booklist $booklist): void;

    function remove(int $number): bool;
}

class BooklistRepositoryImpl implements BooklistRepository
{
    public array $booklist = array();

    public function findAll(): array
    {
        return $this->booklist;
    }

    public function save(Booklist $booklist): void
    {
        $number = sizeof($this->booklist) + 1;
        $this->booklist[$number] = $booklist;
    }

    public function remove(int $number): bool
    {
        if ($number > sizeof($this->booklist)) {
            return false;
        }

        for ($i = $number; $i < sizeof($this->booklist); $i++) {
            $this->booklist[$i] = $this->booklist[$i + 1];
        }

        unset($this->booklist[sizeof($this->booklist)]);

        return true;
    }
}