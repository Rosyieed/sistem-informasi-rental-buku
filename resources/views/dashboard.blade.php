@extends('layouts.mainlayout')

@section('tittle', 'Dashboard')

@section('content')

    <div class="container-dashboard">
        <div class="container-h1-dash p-3 rounded" style="background-color: #fff">
            <h1 class="text-center">Welcome, {{ Auth::user()->username }}</h1>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="card-data book rounded">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-book"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Books</div>
                                <div class="card-count">{{ $book_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-data category rounded">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-list-task"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Categories</div>
                                <div class="card-count">{{ $category_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card-data user rounded">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-people-fill"></i></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Users</div>
                                <div class="card-count">{{ $user_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-rentlog rounded" style="background-color: #fff">
            <div class="mt-5 p-3">
                <h2>Rent-Log</h2>
                <hr>
            </div>
            <div class="p-3">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Peminjam</th>
                            <th>Buku</th>
                            <th>Waktu Pinjam</th>
                            <th>Waktu Kembali</th>
                            <th>Waktu Dikembalikan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentlog as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ $item->book ? $item->book->title : 'Buku Telah Dihapus' }}</td>
                                <td>{{ $item->rent_date }}</td>
                                <td>{{ $item->return_date }}</td>
                                <td>{{ $item->actual_return_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
