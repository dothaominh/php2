<?php
namespace App\Controllers;
use App\Models\Category;

//include_once 'app/models/category.php';
//include_once 'app/controllers/BaseController.php';
class CategoryController extends BaseController{
    public $category;
    public function __construct()
    {
        $this->category = new category();
    }
    public function getcategory() {
        $categorys = $this->category->getListcategory();
        return $this->render('category.index',compact('categorys'));
    }
    public function addcategory(){
        return $this->render('category.add');
    }
    public function postcategory(){
        if (isset($_POST['btn-submit'])){
            $error = [];
            // echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên sản phẩm';
            }
            if(count($error)>=1){
                redirect('errors',  $error, 'add-category');
            }else{
                $check = $this->category->addcategory(NULL, $_POST['name']);
                if ($check){
                    redirect('success',  "Thêm thành công", 'list-category');
                }
                
            }

        }
    }
    public function deletecategory($id){
        $check = $this->category->deletecategory($id);
        if($check){
            redirect('success',  "Xóa thành công", 'list-category');
        }
    }
    public function detailcategory($id){
        $detail = $this->category->detailcategory($id);
        return $this->render('category.edit', compact('detail'));
    }
    public function editcategory($id){
        if (isset($_POST['btn-submit'])){
            $error = [];
//            echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên';
            }
            $route = 'detail-category/'.$id;
            if(count($error)>=1){
                redirect('errors',  $error, $route);
            }else{
                $check = $this->category->editcategory($id, $_POST['name']);
                if ($check){
                    redirect('success',  "Sửa thành công", 'list-category');
                }

            }

        }
    }
}
