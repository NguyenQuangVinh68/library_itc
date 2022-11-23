<?php
$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "default":
        if (isset($_GET['name_category'])) {
            $name_category = $_GET['name_category'];
            $table = "sach";
            $book = new BookModel();
            $result = $book->getBookByCategory($table, $name_category);
            include "./src/views/book/index.php";
        }
        break;

    case "onsearch":

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $column = $_POST["option_search"];
            $txtSearch = $_POST["txtSearch"];

            echo $column;
            echo $txtSearch;
        }

        break;
    case "bookdetail":
        include "./src/views/book/book_detail.php";
        break;
    case "changestatus":
        $masv = $_GET['masv'];
        $masach = $_GET['masach'];
        $c = new BookModel();
        $res = $c->checkStatusOfThisUser($_SESSION['user'], $masach);
        if ($res) {
            $c->removeLike($masv, $masach);
        } else {
            $c->insertLike($masv, $masach);
        }
        echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=book&action=bookdetail&id=$masach'/>";
        break;
    case 'top5':
        include "./src/views/book/bxh.php";
        break;
    case 'mylikebook':
        include "./src/views/book/mylikebook.php";
        break;
}
