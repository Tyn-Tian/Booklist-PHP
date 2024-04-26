<?php

require_once "./BussinesLogic/AddBookList.php";
require_once "./View/ViewShowBookList.php";

addBookList("Atomic Habits");
addBookList("Filosifi Teras");
addBookList("Berani Tidak Disukai");

viewShowBookList();