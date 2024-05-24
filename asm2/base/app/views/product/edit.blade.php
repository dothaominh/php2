@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span>{{$_SESSION['success']}}</span>
    @endif
    <form action="{{route('edit-product/'.$detail->id)}}" method="post">
        <label style="margin-right: 10px">Tên sản phẩm</label>
        <input type="text" name="name" value="{{$detail->name}}" style="margin: 10px"><br>
        <label style="margin-right: 90px">Giá</label>
        <input type="text" name="price" value="{{$detail->price}}" style="margin: 10px"><br>
        <label style="margin-right: 73px">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10" style="margin: 10px">{{$detail->name}}</textarea><br>
        <label style="margin-right: 50px">Số lượng</label>
        <input type="number" name="quantity" style="margin: 10px" min="0"><br>
        <label style="margin-right: 90px">cate_id</label>
        <select name="cate_id" class="form-control">
            @if(!empty($allCate))
            <select class="form-select" id="id_danh_muc" name="id_danh_muc">
                <?php foreach ($listCategory as $valueDSKH){?>
                    <option value="<?php echo $valueDSKH['id'] ?>" selected><?php echo $valueDSKH['ten_danh_muc'] ?></option>
                <?php } ?>
            </select>
            @endif
        </select><br>
        <input type="submit" name="btn-submit" value="Cập Nhật">
    </form>
@endsection