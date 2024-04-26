<?php

require_once "Model/Booklist.php";
require_once "./Helper/Input.php";
require_once "./BussinesLogic/AddBookList.php";

function viewAddTodoList()
{
    echo "MENAMBAHKAN BUKU" . PHP_EOL;

    $book = input("Judul Buku (x untuk batal)");

    if ($book == "x") {
        echo "Batal menambahkan buku" . PHP_EOL;
    } else {
        addBookList($book);
    }
}