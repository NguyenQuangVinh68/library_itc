<?php

$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'default':

        $books = new BookModel();
        $result = $books->getBookByMonth();

        include_once("./src/views/chart/index.php");
        break;
}
