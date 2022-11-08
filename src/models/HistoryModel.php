<?php
class HistoryModel
{
    public function __construct()
    {
    }
    public function getBorrowList()
    {
        $db = new ConnectModel();
        $sql = "SELECT d.masv, d.ngaymuon, d.ngaytra, d.maadm, c.masach, c.nhande 
                FROM danhsachmuon d  
                INNER JOIN chitietmuon c
                ON c.mamuon = d.mamuon
                LIMIT 5";
        $result = $db->getList($sql);
        return $result;
    }

    public function getReturnList()
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM danhsachtra limit 5";
        $result = $db->getList($sql);
        return $result;
    }
}
