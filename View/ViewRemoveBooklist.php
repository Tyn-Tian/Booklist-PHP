<?php

require_once "./BussinesLogic/RemoveBookList.php";
require_once "./BussinesLogic/ShowBookList.php";
require_once "./Helper/Input.php";

function viewRemoveBookList()
{
    echo "MENGHAPUS BUKU" . PHP_EOL;

    showBookList();

    $pilihan = input("Nomor (x untuk batalkan)");

    if ($pilihan == "x") {
        echo "Batal menghapus todo" . PHP_EOL;
    } else {
        $success = removeBookList($pilihan);

        echo $success ? "Sukses" : "Gagal";
        echo " menghapus todo nomor $pilihan" . PHP_EOL;
    }
}