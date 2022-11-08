<?php
$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "default":
        include "./src/views/books/book.php";
        break;
    case "importbooks":
        include "./src/views/books/importbooks.php";
        break;
    case "importbooks_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file = $_FILES['file']['tmp_name'];
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));

            $file_open = fopen($file, 'r');
            $db = null;
            while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $masach = $csv[0];
                $nhande = $csv[1];
                $tacgia = $csv[2];
                $theloai = $csv[3];
                $bosuutap = $csv[4];
                $chuyennganh = $csv[5];
                $anhbia = $csv[6];
                $thongtinxb = $csv[7];
                $vitri = $csv[8];
                $soluong = $csv[9];
                $gia = $csv[10];

                $book = new BookModel();
                $result = $book->insertBookByCSV($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia);
            }
            echo "<script>alert('Thêm vào database thành công!')</script>";
        }
        break;
    case "importbook":
        include "./src/views/books/editbook.php";
        break;
    case "importbook_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masach = $_POST['masach'];
            $nhande = $_POST['nhande'];
            $tacgia = $_POST['tacgia'];
            $theloai = $_POST['theloai'];
            $bosuutap = $_POST['bosuutap'];
            $chuyennganh = $_POST['chuyennganh'];
            $anhbia = $_POST['anhbia'];
            $thongtinxb = $_POST['thongtinxb'];
            $vitri = $_POST['vitri'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $ub = new BookModel();
            $ub->importBook($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia);
            if (isset($ub)) {
                echo '<script> alert("Import success!!!"); </script>';
            } else {
                echo '<script> alert("Import fail!!!"); </script>';
            }
            echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=book&action=default' />";
        }
        break;


    case "findstudent":
        // unset($_SESSION['masv']);
        // unset($_SESSION['tensv']);
        $_SESSION['books'] = array();
        print_r($_SESSION['books']);
        include_once("./src/views/books/findstudent.php");
        break;

    case "borrow":
        if (isset($_SERVER['REQUEST_METHOD']) == "post") {
            $student_code = $_POST['mssv'];
            $student = new StudentModel();
            $result =  $student->getStudentById($student_code);
            if ($result) {
                $_SESSION['masv'] = $result['masv'];
                $_SESSION['tensv'] = $result['tensv'];
            } else {
                unset($_SESSION['masv']);
                unset($_SESSION['tensv']);
            }
            include_once("./src/views/books/borrowbook.php");
        }
        break;


    case "findbook":
        // do hệ thống thêm vào và load lại trang thì lần nhấn tìm tiếp theo hàm count mới bắt đầu đếm
        $limitBorrowBook = 3;
        if (count($_SESSION['books']) < $limitBorrowBook) {
            if (isset($_SERVER['REQUEST_METHOD']) == "post") {

                $masach = $_POST['masach'];
                $book = new BookModel();
                $result = $book->getBookById($masach);

                if ($result) {
                    $item = array(
                        "masach" => $result["masach"],
                        "nhande" => $result["nhande"],
                        "tacgia" => $result["tacgia"],
                        "anhbia" => $result["anhbia"],
                    );

                    $_SESSION['books'][$result["masach"]] = $item;
                }
            }
            include_once("./src/views/books/borrowbook.php");
        } else {
            echo '<script> alert("Số lượng sách mượn vượt quá giới hạn là 3"); </script>';
            include_once("./src/views/books/borrowbook.php");
        }
        break;


    case "borrow_action":

        if (isset($_SESSION['masv'])) {

            // tính toán ngày mượn và ngày trả
            $daysBorrowLimit = 14;
            $monthReturnBooks = date("m");
            $yearReturnBooks = date("Y");
            $dayReturnBooks = date("d") + $daysBorrowLimit;

            $dateBorrow = date("Y-m-d");
            $dateReturnBooks = date("Y-m-d", mktime(0, 0, 0,  $monthReturnBooks, $dayReturnBooks, $yearReturnBooks));

            $book = new BookModel();

            // thêm vào bảng danh sách mượn
            $tableBorrow = 'danhsachmuon';
            $dataBorrow = array(
                "masv" => $_SESSION['masv'],
                "tensv" => $_SESSION['tensv'],
                "ngaymuon" => $dateBorrow,
                "ngaytra" => $dateReturnBooks,
                "maadm" => $_SESSION['admin']
            );
            $result = $book->insertBorrow($tableBorrow, $dataBorrow);

            // khi thêm vào bảng danh sách mượn thành công thì khi này ta mới thêm vào danh sách chi tiết mượn
            if ($result) {
                $codeBorrow = $book->getBorrowByCodeStudent($_SESSION['masv']);
                if ($codeBorrow) {
                    $tableDetail = "chitietmuon";
                    foreach ($_SESSION['books'] as $key => $value) {
                        $dataDetail = array(
                            "mamuon" => $codeBorrow['mamuon'],
                            "masach" => $value['masach'],
                            "soluong" => "1",
                            "nhande" => $value['nhande']
                        );
                        $book->insertBorrowDetailt($tableDetail, $dataDetail);
                    }
                }
            }

            unset($_SESSION['books']);
            unset($_SESSION['masv']);
            unset($_SESSION['tensv']);
            include_once("./src/views/dashboard/index.php");
        }
        break;

    case "editbookform":
        include "./src/views/books/editbook.php";
        break;


    case "updatebook_action":
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $masach = $_POST['masach'];
            $nhande = $_POST['nhande'];
            $tacgia = $_POST['tacgia'];
            $theloai = $_POST['theloai'];
            $bosuutap = $_POST['bosuutap'];
            $chuyennganh = $_POST['chuyennganh'];
            $anhbia = $_POST['anhbia'];
            $thongtinxb = $_POST['thongtinxb'];
            $vitri = $_POST['vitri'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $ub = new BookModel();
            $ub->updateBook($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia);
            if (isset($ub)) {
                echo '<script> alert("Updated success!!!"); </script>';
            } else {
                echo '<script> alert("Updated fail!!!"); </script>';
            }
            include './src/views/books/book.php';
        }
        break;


    case "deletebook":
        $masach = $_GET["id"];
        $b = new BookModel();
        $b->deleteBook($masach);
        echo "<script> alert('Deleted id = " . $masach . " success'); </script>";
        // echo '<script> alert("Delete success!!!"); </script>';
        echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=book&action=default' />";
        break;
}
