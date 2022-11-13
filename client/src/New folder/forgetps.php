<!-- https://longnv.name.vn/video-thay-long-web/hoc-php-qua-video/gui-mail-trong-php-qua-gmail-va-mailtrap -->
<?php
$action="forgetps";
if (isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "forgetps":
        include "View/forgetpassword.php";
        break;
    case "resetps":
        include "View/resetpw.php";
        break;
    case "forgetps_action":
        if(isset($_POST['submit_email']) && $_POST['email'])
        {
            $getemail=$_POST['email'];//chautrantrucly@gmail.com
            $ur=new User();
            $result=$ur->getEmail($getemail);// an, nguyenquangvinhnn031@gmail.com
            $email=md5($result['email']);//nguyenquangvinhnn031@gmail.com
            $pass=md5($result['matkhau']);//123
            $link="<a href='http://localhost/index.php?action=forgetps&act=resetps&key=".$email."&reset=".$pass."'>Click To Reset password</a>";
            $mail = new PHPMailer();
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username
            //$mail->Username = "phplytest20@gmail.com";
            $mail->Username = "nguyenquangvinhnn031@gmail.com";

            // GMAIL password
            // $mail->Password = "Phplytest20@php";
            $mail->Password = "Vinh@2002";
            $mail->SMTPSecure = "tls";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "587";
            $mail->From='phplytest20@gmail.com';
            $mail->FromName='Ly';
            $mail->AddAddress($getemail, 'reciever_name');
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
            if($mail->Send())
            {
            echo "Check Your Email and Click on the link sent to your email";
            }
            else
            {
            echo "Mail Error - >".$mail->ErrorInfo;
            }
        }
        break;
    case "submit_new":

        if(isset($_POST['submit_password']) && $_POST['email'])
        {
            $emailnew=$_POST['email'];
            $passnew=md5($_POST['password']);
            $ur=new User();
            $ur->updateEmail($emailnew,$passnew);
            echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
           
        }
        include "View/login.php";
        break;
}
?>