<?php

$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'default':

        $books = new BookModel();
        $result = $books->getBookByMonth();

        $data = $result->fetchAll();

        include_once("./src/views/chart/index.php");
        break;
}
