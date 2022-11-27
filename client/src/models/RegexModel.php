<?php
class RegexModel
{
    public function __construct()
    {
    }

    public function checkEmail($email)
    {
    }

    public function checkPassword($password)
    {
        $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{6,20}$/";
        $result =  preg_match($regex, $password);
        return  $result;
    }

    public function checkStudentCode($code)
    {
        // $regex = "/^\d{9}$/";
        $regex = "/^(0|[1-9])\d{8}$/";
        $result = preg_match($regex, $code);
        return $result;
    }
}
