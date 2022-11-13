<?php
class LoginModel
{
    var $user = null;
    var $pass = null;
    public function __construct()
    {
    }
    public function loginUser($user, $pass)
    {
        $pass = md5($pass);
        $db = new ConnectModel();
        $select = "select * from sinhvien where masv='$user' and matkhau='$pass'";
        $result = $db -> getList($select);
        echo gettype($result);
        $set = $result->fetch();
        return $set;
    }
}
