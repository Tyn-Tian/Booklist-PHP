<?php

function removeBookList(int $number): bool
{
    global $books;

    if ($number > sizeof($books)) {
        return false;
    }

    // Membuat value array index i menjadi value array index i + 1
    // Dimulai dari index array yang mau dihapus
    for ($i = $number; $i < sizeof($books); $i++) {
        $books[$i] = $books[$i + 1];
    }

    unset($books[sizeof($books)]);

    return true;
}