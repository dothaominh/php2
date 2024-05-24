<?php
namespace App\Models;
//require_once 'app/models/BaseModel.php';
class Category extends BaseModel{
    protected $table = 'category';
   public function getListcategory() {
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addcategory($id, $name){
       $sql = "INSERT INTO $this->table VALUES (?,?)";
       $this->setQuery($sql);
       return $this->execute([$id, $name]);
    }
    public function deletecategory($id){
       $sql = "DELETE FROM $this->table WHERE id = ?";
       $this->setQuery($sql);
       return $this->execute([$id]);
    }
    public function detailcategory($id){
        $sql = "select * from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function editcategory($id, $name){
        $sql = "UPDATE $this->table SET name = ? WHERE id= ?";
        $this->setQuery($sql);
        return $this->execute([ $name, $id]);
    }
}

?>