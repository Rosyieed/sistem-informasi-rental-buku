@extends('layouts.mainlayout')

@section('tittle', 'Peminjam Baru')

@section('content')
@include('sweetalert::alert')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>Registrasi Baru</h1>
        <div class="my-3 d-flex justify-content-end">
            <a href="/users" class="btn btn-primary me-1">User Terdaftar</a>
        </div>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredUsers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-primary" style="background-color: rgb(49, 211, 0)">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
