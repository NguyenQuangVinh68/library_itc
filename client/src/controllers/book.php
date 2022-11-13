<?php
$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "default":
        include "./src/views/search.php";
        break;
    case "onsearch":
        if (isset($_POST["txtSearch"])) {
            $_SESSION['search'] = $_POST["txtSearch"];
            include "./src/views/search.php";
        }
        break;
    case "filtercategory1":
        $_SESSION['khoa'] = "CNTT";
        include "./src/views/search.php";
        break;
    case "filtercategory2":
        $_SESSION['khoa'] = "KT";
        include "./src/views/search.php";
        break;
    case "filtercategory3":
        $_SESSION['theloai'] = "Sách tham khảo";
        include "./src/views/search.php";
        break;
    case "filtercategory4":
        $_SESSION['theloai'] = "Đồ án TN";
        include "./src/views/search.php";
        break;
    case "filtercategory5":
        $_SESSION['theloai'] = "Sách giáo trình";
        include "./src/views/search.php";
        break;
    case "filtercategory6":
        $_SESSION['theloai'] = "Báo tạp chí";
        include "./src/views/search.php";
        break;
    case "bookdetail":
        include "./src/views/book_detail.php";
        break;
    case "changestatus":
        $masv = $_GET['masv'];
        $masach = $_GET['masach'];
        $c = new BookModel();
        $res = $c->checkStatusOfThisUser($_SESSION['user'], $masach);
        if($res){
            $c->removeLike($masv, $masach);
        }else{
            $c->insertLike($masv, $masach);
        }
        echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=book&action=bookdetail&id=$masach'/>";
        break;
    case 'top5':
        include "./src/views/bxh.php";
        break;
    case 'mylikebook':
        include "./src/views/mylikebook.php";
        break;
}
