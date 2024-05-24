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
    <a href="{{route('add-category')}}">
        <button>Thêm danh mục</button>
    </a>
<table border="1">
    <thead>
        <th>ID</th>
        <th>Tên</th>
        <th>Thao Tác</th>

    </thead>
    <tbody>
         @foreach($categorys as $st)
            <tr>
                <td>{{ $st->id }}</td>
                <td>{{ $st->name }}</td>
                <th>
                    <button><a href="{{route('detail-category/'.$st->id)}}" style="color: #000;text-decoration: none;">Sửa</a></button>
                    {{-- <button href="{{route('detail-category/'.$st->id)}}">Sửa</button> --}}
                    <button onclick="confirmDelete('{{route('delete-category/'.$st->id)}}')">Xóa</button>
                </th>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
