<?php

require_once "./Model/Booklist.php";
require_once "./BussinesLogic/ShowBookList.php";
require_once "ViewAddBookList.php";
require_once "ViewRemoveBookList.php";
require_once "./Helper/Input.php";

function viewShowBookList()
{
    while (true) {
        showBookList();

        echo "MENU" . PHP_EOL;
        echo "1. Tambah buku" . PHP_EOL;
        echo "2. Hapus buku" . PHP_EOL;
        echo "x. Keluar" . PHP_EOL;

        $pilihan = input("Pilih");

        if ($pilihan == "x") {
            break;
        } else if ($pilihan == "1") {
            viewAddTodoList();
        } else if ($pilihan == "2") {
            viewRemoveBookList();
        } else {
            echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
    }

    echo "Sampai Jumpa Lagi" . PHP_EOL;
}