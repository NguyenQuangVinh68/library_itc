<?php

class UserModel
{
    public function getUserById($masv)
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM sinhvien WHERE masv = '$masv'";
        return $db->getInstance($sql);
    }

    public function getReply(){
        
    }
}
