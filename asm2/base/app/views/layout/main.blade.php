<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layout.style')
    @include('layout.script')
    {{-- <link rel="stylesheet" href="script.blade.php">
    <link rel="stylesheet" href="style.blade.php"> --}}
    <title>{{ $title }}</title>
</head>
<body>
<div class="container">
    <header>
        <div class="header-main">
            <ul class="menu">
                <li><a href="{{route('list-student')}}">Quản lý sinh viên</a></li>
            </ul>

        </div>
    </header>
    <section class="content">
        @yield('content')
    </section>
    <footer>
        <span>FPT POLYTECHNIC</span>
    </footer>
</div>
</body>
</html>