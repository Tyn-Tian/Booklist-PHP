<?php

function addBookList(string $book)
{
    global $books; 

    $number = sizeof($books) + 1; // Menentukan index dari list book terbaru
    $books[$number] = $book;
}