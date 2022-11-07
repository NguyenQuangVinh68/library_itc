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
        include_once "./src/views/books/findStudent.php";
        break;
    case "borrow":
        if (isset($_SERVER['REQUEST_METHOD']) == "post") {
            $student_code = $_POST['mssv'];
            $student = new StudentModel();
            $result =  $student->getStudentById($student_code);
            require_once("./src/views/books/borrowbook.php");
        }
        break;
    case "borrow_action":
        if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
            $masv = $_POST['masv'];
            $tensv = $_POST['tensv'];
            $masach = $_POST['masach'];
            $tacgia = $_POST['tacgia'];
            $nhande = $_POST['nhande'];
            $ngaymuon = $_POST['ngaymuon'];
            $ngaytra = $_POST['ngaytra'];

            $data = array(
                "masv" => $masv,
                "tensv" => $tensv,
                "masach" => $masach,
                "nhande" => $nhande,
                "tacgia" => $tacgia,
                "ngaymuon" => $ngaymuon,
                "ngaytra" => $ngaytra
            );

            $book = new BookModel();
            $table = 'danhsachmuon';

            $result = $book->insertBorrowLish($table, $data);
            echo $result ? $result : "not fould";
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
