<?php 

require_once "./Model/Booklist.php";
require_once "./BussinesLogic/AddBookList.php";

addBookList("Atomic Habits");
addBookList("Filosifi Teras");
addBookList("Berani Tidak Disukai");

var_dump($books);