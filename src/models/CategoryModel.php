<?php
class CategoryModel
{

    private $table = 'theloai';

    public function __construct()
    {
    }

    public function getCategory()
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM $this->table";
        return $db->getList($sql);
    }

    public function getCategoryById($id)
    {
        $db = new ConnectModel();
        $sql = "SELECT * FROM theloai WHERE id = $id";
        return $db->getInstance($sql);
    }

    public function insertCategory($data)
    {
        $db = new ConnectModel();
        return $db->insert($this->table, $data);
    }

    public function updateCategory($tentheloai, $mamenu, $id)
    {
        $db = new ConnectModel();
        $sql = "UPDATE $this->table SET tentheloai = '$tentheloai', mamenu = '$mamenu' WHERE id = $id";
        return $db->exec($sql);
    }

    public function deleteCategory($id)
    {
        $db = new ConnectModel();
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $db->exec($sql);
    }
}
