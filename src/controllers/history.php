<?php
$action = "default";
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case "default":
        include "./src/views/books/findStudent.php";

        break;
    case "borrowingbookbyid":
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
            include_once("./src/views/history/borrowing.php");
        }
        break;
    case 'returnaction':
        if (isset($_GET['mamuon']) & isset($_GET['masach'])) {
            $mamuon = $_GET['mamuon'];
            $masach = $_GET['masach'];
            $masv = $_SESSION['masv'];
            $h = new HistoryModel();
            $result = $h->returnABook($mamuon, $masach,$masv);
            if ($result) {
                $result = $h->checkExistBorrowing($mamuon);
                if (!$result) {
                    $h->removeBorrowId($mamuon);
                }
                echo "<script> alert('Đã trả sách!'); </script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }
        break;
    case 'losebook':
        if (isset($_GET['mamuon']) & isset($_GET['masach'])) {
            $mamuon = $_GET['mamuon'];
            $masach = $_GET['masach'];
            $masv = $_SESSION['masv'];
            $h = new HistoryModel();
            $res = $h->getInfoLoseBook($mamuon, $masach);
            $nhande = $res['nhande'];
            $ngaymuon = $res['ngaymuon'];
            $ngaybaomat = date('Y-m-d');
            $tienphat = $res['gia'];
            $maadm = $res['maadm'];
            $result = $h->loseABook($masv, $masach, $nhande, $ngaymuon, $ngaybaomat, $tienphat, $maadm,$mamuon);
            
            if ($result) {
                $result = $h->checkExistBorrowing($mamuon);
                if (!$result) {
                    $h->removeBorrowId($mamuon);
                }
                echo "<script> alert('Đã báo mất sách!'); </script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }
        break;
    case "lated":
        include "./src/views/history/lated.php";
        break;
}

?>