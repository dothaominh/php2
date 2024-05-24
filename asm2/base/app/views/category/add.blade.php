@extends('layout.main')
@section('content')
    <h2>Thêm danh mục</h2>
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
        <form action="{{route('post-category')}}" method="post">
        <label style="margin-right: 10px">Tên danh mục sản phẩm</label>
        <input type="text" name="name" style="margin: 10px"><br>
        <input type="submit" name="btn-submit" value="Gửi">
    </form>
@endsection