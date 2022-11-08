<?php
class BookModel
{
    public function __construct()
    {
    }

    public function getAllBook()
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM sach ";
        $result = $db->getList($sql);
        return $result;
    }

    public function getDanhSachMuon($month)
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM danhsachmuon WHERE MONTH(ngaymuon) = $month";
        $result = $db->getList($sql);
        return $result;
    }

    public function getDanhSachTra($month)
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM danhsachtra WHERE MONTH(ngaytra) = $month";
        $result = $db->getList($sql);
        return $result;
    }

    public function getBookById($masach)
    {
        $db = new ConnectModel();
        $sql = "SELECT masach, nhande, tacgia,anhbia FROM sach WHERE masach = '$masach' AND soluong > 0";

        return $db->getInstance($sql);
    }

    function insertBookByCSV($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia)
    {
        $db = new ConnectModel();
        $query = "INSERT INTO sach(masach, nhande, tacgia, theloai, bosuutap, chuyennganh, anhbia, thongtinxb, vitri, soluong, gia) 
        VALUES ($masach, '$nhande', '$tacgia', '$theloai', '$bosuutap', '$chuyennganh', '$anhbia', '$thongtinxb', '$vitri', $soluong, $gia)";
        $result = $db->exec($query);
        return $result;
    }


    public function importBook($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia)
    {
        $db = new ConnectModel();
        $query = "INSERT INTO sach(masach, nhande, tacgia, theloai, bosuutap, chuyennganh, anhbia, thongtinxb, vitri, soluong, gia) VALUES (null, '$nhande', '$tacgia', '$theloai', '$bosuutap', '$chuyennganh', '$anhbia', '$thongtinxb', '$vitri', $soluong, $gia)";
        $db->exec($query);
    }

    public function getBookID($id)
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM sach where masach= '$id'";
        $result = $db->getList($sql);
        $set = $result->fetch();
        return $set;
    }

    public function updateStockInBook($masach, $soluong)
    {
        $db = new ConnectModel();
        $sql =  "UPDATE sach SET soluong = soluong - $soluong WHERE masach = '$masach'";
        $db->exec($sql);
    }

    public function updateBook($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia)
    {
        $db = new ConnectModel();
        $query = "UPDATE sach set 
        masach = '$masach',
        nhande = '$nhande',
        tacgia = '$tacgia',
        theloai = '$theloai',
        bosuutap = '$bosuutap',
        chuyennganh = '$chuyennganh',
        anhbia = '$anhbia',
        thongtinxb = '$thongtinxb',
        vitri = '$vitri',
        soluong =  '$soluong',
        gia = '$gia' 
        WHERE masach = '$masach'";
        $db->exec($query);
    }

    public function deleteBook($masach)
    {
        $db = new ConnectModel();
        $query = "DELETE FROM sach WHERE masach = '$masach'";
        $db->exec($query);
    }


    // quản lý hoạt động

    public function getBorrowByCodeStudent($codeStudent)
    {
        $db  = new ConnectModel();
        $sql = "SELECT mamuon FROM danhsachmuon WHERE masv = '$codeStudent' ORDER BY mamuon DESC LIMIT 1";
        return $db->getInstance($sql);
    }

    public function insertBorrow($table, $data)
    {
        $db = new ConnectModel();
        return $db->insert($table, $data);
    }

    public function insertBorrowDetailt($table, $data)
    {
        $db = new ConnectModel();
        return $db->insert($table, $data);
    }
}
