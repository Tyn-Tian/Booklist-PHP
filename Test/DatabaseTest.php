<?php

require_once "./vendor/autoload.php";

use BooklistPhp\Config\Database;

$db = Database::getConnection();
echo "Sukses membuat koneksi ke database";