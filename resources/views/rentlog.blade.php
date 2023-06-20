@extends('layouts.mainlayout')

@section('tittle', 'Log Peminjaman')

@section('content')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>Log Peminjaman</h1>
        <hr>
            <table class="table ">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>Waktu Pinjam</th>
                        <th>Waktu Kembali</th>
                        <th>Waktu Dikembalikan</th>
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
    @endsection
