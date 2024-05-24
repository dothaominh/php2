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
    <form action="{{route('post-product')}}" method="post">
        <label style="margin-right: 10px">Tên sản phẩm</label>
        <input type="text" name="name" style="margin: 10px"><br>
        <label style="margin-right: 90px">Giá</label>
        <input type="text" name="price" style="margin: 10px"><br>
        <label style="margin-right: 73px">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10" style="margin: 10px"></textarea><br>
        <label style="margin-right: 50px">Số lượng</label>
        <input type="number" name="quantity" style="margin: 10px" min="0"><br>
        <label style="margin-right: 90px">loại</label>
        <select name="cate_id" class="form-control">
            @if(!empty($allCate))
                @foreach ($allCate as $allca)
             
                    <option value="{{$allca->id}}" >{{ $allca->name}}</option>
                @endforeach
            @endif
        </select><br>
        <input type="submit" name="btn-submit" value="Gửi">
    </form>
@endsection