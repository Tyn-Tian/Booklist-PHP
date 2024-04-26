<?php

require_once "./BussinesLogic/AddBookList.php";
require_once "./BussinesLogic/ShowBookList.php";
require_once "./View/ViewAddBookList.php";

addBookList("Atomic Habits");
addBookList("Filosifi Teras");
addBookList("Berani Tidak Disukai");

viewAddTodoList();

showBookList();