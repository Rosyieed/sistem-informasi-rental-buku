<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | @yield('tittle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('images/buku.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #4875A8">
            <div class="container-fluid">
                <a href="/dashboard" class="navbar-brand"> <b>Rental Buku</b> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
        </nav>
        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
                    @if (Auth::user()->role_id == 1)
                        <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class = 'active' @endif>Dashboard</a>
                        <a href="/books" @if (request()->route()->uri == 'books' ||
                                request()->route()->uri == 'book-deleted' ||
                                request()->route()->uri == 'book-add' ||
                                request()->route()->uri == 'book-edit/{slug}' ||
                                request()->route()->uri == 'book-delete/{slug}') class = 'active' @endif>Buku</a>
                        <a href="/categories" @if (request()->route()->uri == 'categories' ||
                                request()->route()->uri == 'category-add' ||
                                request()->route()->uri == 'category-delete/{slug}' ||
                                request()->route()->uri == 'category-edit/{slug}') class = 'active' @endif>Kategori</a>
                        <a href="/users" @if (request()->route()->uri == 'users' ||
                                request()->route()->uri == 'user-detail/{slug}' ||
                                request()->route()->uri == 'registered-users') class = 'active' @endif>Peminjam</a>
                        <a href="/book-rent" @if (request()->route()->uri == 'book-rent') class = 'active' @endif>Peminjaman
                            Buku</a>
                        <a href="rent-return" @if (request()->route()->uri == 'rent-return') class = 'active' @endif>Pengembalian
                            Buku</a>
                        <a href="/rentlog" @if (request()->route()->uri == 'rentlog') class = 'active' @endif>Log Peminjaman</a>
                        <a href="/logout" @if (request()->route()->uri == 'logout') class = 'active' @endif>Logout</a>
                    @else
                        <a href="profile"  @if (request()->route()->uri == 'profile') class = 'active' @endif>Profile</a>
                        <a href="logout">Logout</a>
                    @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>
