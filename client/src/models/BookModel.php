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
}
?>