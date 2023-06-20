@extends('layouts.mainlayout')

@section('tittle', 'Hapus Kategori')

@section('content')
    <div class="container-category p-3 rounded" style="background-color: #fff">
        <h2>Apakah kamu yakin ingin menghapus {{ $category->name }}?</h2>
        <div>
            <a href="/category-destroy/{{ $category->slug }}" class="btn btn-success">Yakin</a>
            <a href="/categories" class="btn btn-danger">Batal</a>
        </div>
    </div>
@endsection
