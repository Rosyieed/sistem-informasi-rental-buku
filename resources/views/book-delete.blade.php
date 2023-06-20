@extends('layouts.mainlayout')

@section('tittle', 'Hapus Buku')

@section('content')
    <div class="container-delete p-3 rounded" style="background-color: #fff">
        <h2>Apakah kamu yakin ingin menghapus {{ $book->title }}?</h2>
        <div>
            <a href="/book-destroy/{{ $book->slug }}" class="btn btn-success">Yakin</a>
            <a href="/books" class="btn btn-danger">Batal</a>
        </div>
    </div>
@endsection
