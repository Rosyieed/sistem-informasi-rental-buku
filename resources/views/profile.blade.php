@extends('layouts.mainlayout')

@section('tittle', 'profile')

@section('content')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>Halo {{ Auth::user()->username }}</h1>
        <h5>Di bawah ini Log Peminjaman Kamu</h5>
        <hr>
        <table class="table ">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User</th>
                    <th>Book</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
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
@endsection
