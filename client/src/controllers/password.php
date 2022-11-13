<?php 
include "class.phpmailer.php";
include "class.smtp.php";
$action="password";
if(isset($_GET["action"])){
    $action = $_GET["action"];
}
switch($action){
    case "password":
        include "./src/views/login/password.php";
        break;
    case "password_action":
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $user = $_POST["txtusername"];
            $email = $_POST["txtemail"];
            $dt = new PasswordModel();
            $result = $dt->getPassword($user, $email);
            if($result!=false){
                ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
                $from = "test@hostinger-tutorials.com";
                $to = "nguyenthanhbinh06051999@gmail.com";
                $subject = "Checking PHP mail";
                $message = "PHP mail works just fine";
                $headers = "From:" . $from;
                $mail = mail($to,$subject,$message, $headers);
                echo "The email message was sent.";

                if ($mail) {
                    echo "OK";
                    echo "<script>console.log(".$mail.")</script>";
                }
            } else {
                echo "<script> alert('Tên đăng nhập hoặc mật khẩu không đúng');</script>";
                echo "<meta http-equiv='refresh' content='0;url=./index.php' />";
            }
        }
        break;
}

?>