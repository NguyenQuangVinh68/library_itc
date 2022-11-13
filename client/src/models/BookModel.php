<?php
class BookModel{
    public function __construct()
    {
        
    }
    public function getAllBook(){
        $db = new ConnectModel();
        $select = "select * from sach";
        $res = $db->getList($select);
        return $res;
    }
    public function onSearch($keyword){
        $db = new ConnectModel();
        $select = "select * from sach where nhande like '%$keyword%'";
        $result = $db->getList($select);
        return $result;

    }
    public function getListITBook(){
        $db = new ConnectModel();
        $select = "select * from sach where bosuutap like '%CNTT%' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getListECBook(){
        $db = new ConnectModel();
        $select = "select * from sach where bosuutap like '%KT%' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getListReferenceBook(){
        $db = new ConnectModel();
        $select = "select * from sach where theloai like 'Sách tham khảo' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getListThesisBook(){
        $db = new ConnectModel();
        $select = "select * from sach where theloai like 'Đồ án TN' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getListCurriculumBook(){
        $db = new ConnectModel();
        $select = "select * from sach where theloai like 'Sách giáo trình' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getListMagazine(){
        $db = new ConnectModel();
        $select = "select * from sach where theloai like 'Báo tạp chí' ";
        $result = $db->getList($select);
        return $result;

    }
    public function getDetailInformation($id){
        $db = new ConnectModel();
        $select = "select * from sach where masach = $id ";
        $result = $db->getInstance($select);
        return $result;
    }
    public function checkStatusOfThisUser($masv,$masach){
        $db = new ConnectModel();
        $select = "select * from yeuthich  where masv = '$masv' and masach = '$masach'";
        $result = $db->getInstance($select);
        return $result;
    }
    public function removeLike($masv,$masach){
        $db = new ConnectModel();
        $select = "delete from yeuthich where masv = '$masv' and masach = '$masach'";
        $result = $db->exec($select);
        return $result;
    }
    public function insertLike($masv,$masach){
        $db = new ConnectModel();
        $select = "insert into yeuthich(mayeuthich, masv, masach) values(null, '$masv' ,'$masach')";
        $result = $db->exec($select);
        return $result;
    }
    public function getSumLike($masach){
        $db = new ConnectModel();
        $select = "select count(masv) as sl from yeuthich where masach='$masach'";
        $result = $db->getInstance($select);
        return $result;
    }
    public function getTop5Like(){
        $db = new ConnectModel();
        $select = "select s.masach, nhande, tacgia, anhbia,count(masv) as sl from yeuthich y, sach s where s.masach = y.masach group by masach order by sl desc limit 5";
        $result = $db->getList($select);
        return $result;
    }
    public function getTop5Read(){
        $db = new ConnectModel();
        $select = "select masach, nhande, tacgia, anhbia,soluongmuon as sl from sach order by sl desc limit 5";
        $result = $db->getList($select);
        return $result;
    }
    public function getMyLikeBook($masv){
        $db = new ConnectModel();
        $select = "select s.masach, nhande, tacgia, anhbia from yeuthich y, sinhvien sv, sach s where s.masach = y.masach and y.masv = sv.masv and sv.masv= '$masv' ";
        $result = $db->getList($select);
        return $result;
    }
}
?>