<?php 
class HistoryModel{
    public function __construct()
    {
    }
    public function getBorrowList()
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM danhsachmuon limit 5";
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

?>