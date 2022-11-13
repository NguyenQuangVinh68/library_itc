<?php 
$action="login";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}
switch($action){
    case "login":
        include "./src/views/login/login.php";
        break;
    case "login_action":
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $user = $_POST["txtusername"];
            $pass = $_POST["txtpassword"];
            $dt = new LoginModel();
            $result = $dt->loginUser($user, $pass);
            echo $result;
            if($result!=false){
                $_SESSION['user'] = $result[0];
                $_SESSION['tenuser'] = $result[1];
                echo "<script> alert('Đăng nhập thành công');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            } else {
                echo "<script> alert('Tên đăng nhập hoặc mật khẩu không đúng');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }
        break;
    case 'logout':
        unset($_SESSION['user']);
        unset($_SESSION['tenuser']);
        echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
        break;
}

?>