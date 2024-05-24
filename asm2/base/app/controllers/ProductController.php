<?php
namespace App\Controllers;
use App\Models\Product;

//include_once 'app/models/product.php';
//include_once 'app/controllers/BaseController.php';
class ProductController extends BaseController{
    public $product;
    public function __construct()
    {
        $this->product = new product();
    }
    public function getproduct() {
        $products = $this->product->getListproduct();
        return $this->render('product.index',compact('products'));
    }
    public function addproduct(){
        $allCate = $this->product->getAllCate();
        return $this->render('product.add',compact('allCate'));
    }
    public function postproduct(){
        if (isset($_POST['btn-submit'])){
            $error = [];
//            echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên sản phẩm';
            }
            if(empty($_POST['price'])){
                $error[] = 'Vui lòng nhập giá';
            }
            if(empty($_POST['description'])){
                $error[] = 'Vui lòng nhập mô tả';
            }
            if(empty($_POST['quantity'])){
                $error[] = 'Vui lòng nhập số lượng';
            }
            if(empty($_POST['cate_id'])){
                $error[] = 'Vui lòng chọn loại';
            }
            if(count($error)>=1){
                redirect('errors',  $error, 'add-product');
            }else{
                $check = $this->product->addproduct(NULL, $_POST['name'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['cate_id']);
                if ($check){
                    redirect('success',  "Thêm thành công", 'list-product');
                }

            }

        }
    }
    public function deleteproduct($id){
        $check = $this->product->deleteproduct($id);
        if($check){
            redirect('success',  "Xóa thành công", 'list-product');
        }
    }
    public function detailproduct($id){
        $detail = $this->product->detailproduct($id);
        return $this->render('product.edit', compact('detail'));
    }
    public function editproduct($id){
        if (isset($_POST['btn-submit'])){
            $error = [];
//            echo 123;
            // validate rỗng
            if(empty($_POST['name'])){
                $error[] = 'Vui lòng nhập tên sản phẩm';
            }
            if(empty($_POST['price'])){
                $error[] = 'Vui lòng nhập giá';
            }
            if(empty($_POST['description'])){
                $error[] = 'Vui lòng nhập mô tả';
            }
            if(empty($_POST['quantity'])){
                $error[] = 'Vui lòng nhập số lượng';
            }
            if(empty($_POST['cate_id'])){
                $error[] = 'Vui lòng chọn loại';
            }
            $route = 'detail-product/'.$id;
            if(count($error)>=1){
                redirect('errors',  $error, $route);
            }else{
                $check = $this->product->editproduct($id, $_POST['name'], $_POST['price'], $_POST['description'], $_POST['quantity'], $_POST['cate_id']);
                if ($check){
                    redirect('success',  "Sửa thành công", 'list-product');
                }

            }

        }
    }
}
