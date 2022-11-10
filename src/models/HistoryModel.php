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
    public function getBorrowListByID($masv)
    {
        $db = new ConnectModel();
        $sql = "SELECT  d.masv, d.ngaymuon, d.ngaytra, d.maadm, c.masach, c.nhande, c.soluong, c.mamuon
                FROM danhsachmuon d  
                INNER JOIN chitietmuon c
                ON c.mamuon = d.mamuon
                WHERE d.masv = '$masv'
                ORDER BY  c.mamuon DESC";
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
    public function getLoseBook(){
        $db = new ConnectModel();
        $sql = "SELECT * FROM danhsachmat limit 5";
        $result = $db->getList($sql);
        return $result;
    }
    public function returnABook($mamuon, $masach,$masv)
    {
        $db = new ConnectModel();
        $sql = "update sach set soluong = soluong+1 WHERE masach = '$masach'";
        $db->exec($sql);
        //get info book 
        $n = "SELECT c.nhande, d.maadm from danhsachmuon d, chitietmuon c where d.mamuon = '$mamuon' and c.mamuon ='$mamuon' and c.masach = '$masach'";
        $res = $db->getInstance($n);
        $nhande = $res['nhande'];
        $maadm = $res['maadm'];
        $ngaytra = date("Y-m-d");
        $sql3 = "insert into danhsachtra(matra, masv, masach, nhande, maadm, ngaytra) values(null, '$masv', '$masach', '$nhande', '$maadm', '$ngaytra')";
        $result = $db->exec($sql3);
        $sql2 = "delete from chitietmuon where mamuon = '$mamuon' and masach = '$masach'";
        $result = $db->exec($sql2);
        return $result;
    }
    public function getInfoLoseBook($mamuon, $masach)
    {
        $db = new ConnectModel();
        // truy xuất các giá trị cần thêm vào bảng trước khi thực hiện thêm
        $n = "SELECT c.nhande, d.ngaymuon, d.maadm, s.gia from danhsachmuon d, chitietmuon c, sach s where d.mamuon = '$mamuon' and c.mamuon ='$mamuon' and c.masach = '$masach' and s.masach = '$masach'";
        $res = $db->getInstance($n);
        return $res;
    }
    public function loseABook($masv, $masach, $nhande, $ngaymuon, $ngaybaomat, $tienphat, $maadm,$mamuon)
    {
        $db = new ConnectModel();
        
        // thực hiện thêm dòng vào bảng danhsachmat
        $sql = "insert into danhsachmat(masv,masach,nhande,ngaymuon,ngaybaomat,tienphat,maadm) values('$masv','$masach','$nhande','$ngaymuon','$ngaybaomat','$tienphat','$maadm')";
        $result = $db->exec($sql);
        //xóa dòng chi tiết mượn
        $sql = "delete from chitietmuon where mamuon = '$mamuon' and masach = '$masach'";
        $result = $db->exec($sql);
        return $result;
    }
    public function checkExistBorrowing($mamuon)
    {
        $db = new ConnectModel();
        $sql = "Select * from chitietmuon where mamuon = '$mamuon'";
        $result = $db->getInstance($sql);
        return $result;
    }
    public function removeBorrowId($mamuon)
    {
        $db = new ConnectModel();
        $sql = "delete from danhsachmuon where mamuon = '$mamuon' ";
        $db->exec($sql);
    }
    /**
     * Lấy danh sách sinh viên mượn sách quá hạn
     */
    public function getListLated(){
        $db = new ConnectModel();
        $sql = "select sv.masv, sv.tensv, c.nhande, d.ngaymuon, d.ngaytra from danhsachmuon d, chitietmuon c, sinhvien sv where d.mamuon = c.mamuon and d.masv = sv.masv";
        $result = $db->getList($sql);
        return $result;
    }
}
