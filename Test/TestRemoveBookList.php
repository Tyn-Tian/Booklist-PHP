<?php

require_once "./Model/Booklist.php";
require_once "./BussinesLogic/AddBookList.php";
require_once "./BussinesLogic/ShowBookList.php";
require_once "./BussinesLogic/RemoveBookList.php";

addBookList("Atomic Habits");
addBookList("Filosifi Teras");
addBookList("Berani Tidak Disukai");
addBookList("Swordmanship Younger son");
addBookList("Superhuman Battlefield");

showBookList();

removeBookList(3);

showBookList();

removeBookList(2);

showBookList();

$success = removeBookList(4);
var_dump($success);

showBookList();