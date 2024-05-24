<?php
namespace App\Models;
//require_once 'app/models/BaseModel.php';
class Product extends BaseModel{
    protected $table = 'product';
    public function getListproduct() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addproduct($id, $name, $price, $description, $quantity, $cate_id){
       $sql = "INSERT INTO $this->table VALUES (?, ?, ?, ?, ?, ?)";
       $this->setQuery($sql);
       return $this->execute([$id, $name, $price, $description, $quantity, $cate_id]);
    }
    public function deleteproduct($id){
       $sql = "DELETE FROM $this->table WHERE id = ?";
       $this->setQuery($sql);
       return $this->execute([$id]);
    }
    public function detailproduct($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editproduct($id, $name, $price, $description, $quantity, $cate_id){
        $sql = "UPDATE $this->table SET name = ?, price = ?, description = ?, quantity = ?, cate_id = ? WHERE id= ?";
        $this->setQuery($sql);
        return $this->execute([$id, $name, $price, $description, $quantity, $cate_id]);
    }
    
    public function getAllCate()
    {
        $sql = "SELECT * FROM category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}

?>