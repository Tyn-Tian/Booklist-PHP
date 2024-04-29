<?php

namespace BooklistPhp\View;

use BooklistPhp\Service\BooklistService;
use BooklistPhp\Helper\InputHelper;

class BooklistView
{
    public function __construct(
        private BooklistService $booklistService
    ) {
    }

    function showBooklist(): void
    {
        while (true) {
            $this->booklistService->showBooklist();

            echo "MENU" . PHP_EOL;
            echo "1. Tambah buku" . PHP_EOL;
            echo "2. Hapus buku" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;

            $pilihan = InputHelper::input("Pilih");

            if ($pilihan == "1") {
                $this->addBooklist();
            } else if ($pilihan == "2") {
                $this->removeBooklist();
            } else if ($pilihan == "x") {
                break;
            } else {
                echo "Pilihan tidak dimengerti" . PHP_EOL;
            }

            echo "Sampai Jumpa Lagi" . PHP_EOL;
        }
    }

    function addBooklist(): void 
    {
        echo "MENAMBAHKAN BUKU" . PHP_EOL;

        $book = InputHelper::input("Buku (x untuk batal)");

        if ($book == "x") {
            echo "Batal menambah buku" . PHP_EOL;
        } else {
            $this->booklistService->addBooklist($book);
        }
    }

    function removeBooklist(): void
    {
        echo "MENGHAPUS BUKU" . PHP_EOL;

        $this->booklistService->showBooklist();

        $pilihan = InputHelper::input("Nomor (x untuk batalkan)");

        if ($pilihan == "x") {
            echo "Batal menghapus buku" . PHP_EOL;
        } else {
            $this->booklistService->removeBooklist($pilihan);
        }
    }
}