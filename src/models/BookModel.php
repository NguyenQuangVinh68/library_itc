<?php

use LDAP\Connection;

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

    function insertBookByCSV($masach, $nhande, $tacgia, $theloai, $bosuutap, $chuyennganh, $anhbia, $thongtinxb, $vitri, $soluong, $gia, $soluongmuon)
    {
        $db = new ConnectModel();
        $query = "INSERT INTO sach(masach, nhande, tacgia, theloai, bosuutap, chuyennganh, anhbia, thongtinxb, vitri, soluong, gia,soluongmuon) 
        VALUES ($masach, '$nhande', '$tacgia', '$theloai', '$bosuutap', '$chuyennganh', '$anhbia', '$thongtinxb', '$vitri', $soluong, $gia,$soluongmuon)";
        // echo $query."<br>";
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

    public function totalborrowByStudent($codeStudent)
    {
        $db = new ConnectModel();
        $sql = "SELECT * 
                FROM danhsachmuon DS
                INNER JOIN chitietmuon CT
                ON DS.mamuon = CT.mamuon 
                WHERE DS.masv = '$codeStudent'";
        $row = $db->getList($sql);
        return count($row->fetchAll());
    }
    public function totalreturnByStudent($codeStudent)
    {
        $db = new ConnectModel();
        $sql = "SELECT * 
                FROM danhsachtra
                WHERE masv = '$codeStudent'";
        $row = $db->getList($sql);
        return count($row->fetchAll());
    }

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

    public function getIdBookFromListBorrow($masach, $masv)
    {
        $db = new ConnectModel();
        $sql = "SELECT ds.masv, ds.tensv, ct.masach 
                FROM danhsachmuon ds
                INNER JOIN chitietmuon ct
                ON ds.mamuon = ct.mamuon
                WHERE ct.masach = '$masach'
                AND ds.masv = '$masv'";

        return $db->getInstance($sql);
    }

    public function updateBorrowNumber($masach, $soluong)
    {
        $db = new ConnectModel();
        $sql = "UPDATE sach SET soluongmuon = soluongmuon + $soluong WHERE masach = $masach";
        echo $sql;
        return $db->exec($sql);
    }

    // chart

    public function getBookByMonth()
    {
        $db = new ConnectModel();
        $sql = "SELECT s.nhande,MONTH(ds.ngaymuon) AS ngaymuon,ct.tong 
                FROM danhsachmuon ds 
                INNER JOIN (SELECT mamuon, masach, COUNT(soluong) AS tong FROM chitietmuon GROUP BY masach) ct 
                ON ds.mamuon = ct.mamuon 
                INNER JOIN sach s
                ON s.masach = ct.masach 
                WHERE month(ds.ngaymuon) = 11";
        return  $db->getList($sql);
    }
}
