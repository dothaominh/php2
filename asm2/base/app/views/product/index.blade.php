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
<a href="{{route('add-product')}}">
    <button>Thêm sản phẩm</button>
</a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Mô tả</th>
        <th>số lượng</th>
        <th>loại</th>
        <th>Thao Tác</th>

    </thead>
    <tbody>
         @foreach($products as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <td>{{ $st->price }}</td>
                <td>{{ $st->description }}</td>
                <td>{{ $st->number }}</td>
                <td>{{ $st->cate_id }}</td>
                <th>
                    <button><a href="{{route('detail-product/'.$st->id)}}" style="color: #000;text-decoration: none;">Sửa</a></button>
                    {{-- <button href="{{route('detail-product/'.$st->id)}}">Sửa</button> --}}
                    <button onclick="confirmDelete('{{route('delete-product/'.$st->id)}}')">Xóa</button>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
