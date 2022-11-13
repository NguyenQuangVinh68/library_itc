<?php
class PasswordModel
{
    var $user = null;
    var $email = null;
    public function __construct()
    {
    }
    public function getPassword($user, $email)
    {
        $db = new ConnectModel();
        $select = "select * from sinhvien where masv='$user' and email='$email'";
        $result = $db -> getList($select);
        echo gettype($result);
        $set = $result->fetch();
        return $set;
    }
}
