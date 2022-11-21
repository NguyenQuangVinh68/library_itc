<?php

use LDAP\Result;

$action = "default";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case 'default':
        include_once("./src/views/category/index.php");
        break;

    case 'addcategory':
        include_once("./src/views/category/editcategory.php");
        break;

    case 'add_action':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tentheloai = $_POST['tentheloai'];
            $mamenu = $_POST['mamenu'];
            $category = new CategoryModel();
            $data = array(
                "tentheloai" => $tentheloai,
                "mamenu" => $mamenu,
            );

            $result = $category->insertCategory($data);
            if ($result) {
                echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=category&action=default' />";
            } else  echo '<script> alert("Thêm thất bại!!!"); </script>';;
        }
        break;

    case 'editcategory':
        include_once("./src/views/category/editcategory.php");
        break;

    case 'edit_action':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tentheloai = $_POST['tentheloai'];
            $mamenu = $_POST['mamenu'];
            $idmenu = $_POST['idmenu'];
            $category = new CategoryModel();

            echo $tentheloai;

            $result = $category->updateCategory($tentheloai, $mamenu, $idmenu);

            if ($result) {
                echo '<script> alert("Cập nhật thành công!!!"); </script>';
                echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=category&action=default' />";
            } else  echo '<script> alert("Cập nhật thất bại!!!"); </script>';
        }
        break;

    case 'deletecategory':
        $id = $_GET["id"];
        $category = new CategoryModel();
        $result = $category->getCategoryById($id);
        $tentheloai = $result['tentheloai'];

        // delete books by category
        $category->deleteCategory($id);

        $book = new BookModel();


        $book->deleteBookByCategory($tentheloai);
        
        echo "<script> alert('Deleted id = " . $id . " success'); </script>";
        // echo '<script> alert("Delete success!!!"); </script>';
        echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=category&action=default' />";
        break;
}
