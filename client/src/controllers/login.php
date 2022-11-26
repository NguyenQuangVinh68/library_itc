<?php
$action = "login";
if (isset($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "login":
        include "./src/views/login/login.php";
        break;
    case "login_action":
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["txtusername"];
            $pass = md5($_POST["txtpassword"]);
            $user = new UserModel();

            $result = $user->loginUser($username, $pass);
            if ($result) {
                $_SESSION['user'] = $result["masv"];
                $_SESSION['tenuser'] = $result["tensv"];
                $_SESSION['gender'] = $result['gioitinh'];
                echo "<script> alert('Đăng nhập thành công');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            } else {
                echo "<script> alert('Tên đăng nhập hoặc mật khẩu không đúng');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=login' />";
            }
        }
        break;
    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['tenuser']);
        unset($_SESSION['gender']);
        echo "<meta http-equiv='refresh' content='0;url=./index.php?controller=login' />";
        break;
}
