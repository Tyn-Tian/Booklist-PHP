<?php

require_once "./Model/Booklist.php";
require_once "./View/ViewRemoveBookList.php";
require_once "./BussinesLogic/AddBookList.php";
require_once "./BussinesLogic/ShowBookList.php";

addBookList("Atomic Habits");
addBookList("Filosifi Teras");
addBookList("Berani Tidak Disukai");

showBookList();

viewRemoveBookList();

showBookList();