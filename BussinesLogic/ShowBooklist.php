<?php

function showBookList()
{
    global $books;

    echo "BOOKLIST" . PHP_EOL;

    foreach ($books as $number => $book) {
        echo "$number. $book" . PHP_EOL;
    }
}