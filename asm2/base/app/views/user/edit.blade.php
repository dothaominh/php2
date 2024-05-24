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
    <form action="{{route('edit-category/'.$detail->id)}}" method="post">
        <label>Tên danh mục</label>
        <input type="text" name="name" value="{{$detail->name}}">
        <input type="submit" name="btn-submit" value="Cập Nhật">
    </form>
@endsection