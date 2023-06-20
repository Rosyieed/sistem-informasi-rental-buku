@extends('layouts.mainlayout')

@section('tittle', 'Detail Peminjam')

@section('content')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>Data Peminjam</h1>

        <div class="my-3 d-flex justify-content-end">
            @if ($user->status == 'inactive')
                <a href="/user-approve/{{ $user->slug }}" class="btn btn-primary me-1">Terima</a>
            @endif

            @if ($user->status == 'active')
                <a href="/users" class="btn btn-primary me-1">Kembali</a>
            @endif
        </div>
        <hr>

        <div class="mb-3">
            <label for="" class="form-label">Username</label>
            <input type="text" class="form-control" readonly value="{{ $user->username }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Phone</label>
            <input type="text" class="form-control" readonly value="{{ $user->phone }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Adress</label>
            <input type="text" class="form-control" readonly value="{{ $user->address }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Status</label>
            <input type="text" class="form-control" readonly value="{{ $user->status }}">
        </div>
    </div>

@endsection
