@extends('layouts.mainlayout')

@section('tittle', 'Peminjam')

@section('content')
    @include('sweetalert::alert')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>List Peminjam</h1>

        <div class="my-4 d-flex justify-content-start">
            <a href="/registered-users" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Pendaftar Baru</a>
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
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>
                            <a href="/user-detail/{{ $item->slug }}" class="btn btn-primary"
                                style="background-color: rgb(49, 211, 0)">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
