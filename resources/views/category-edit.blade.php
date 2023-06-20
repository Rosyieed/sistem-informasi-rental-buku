@extends('layouts.mainlayout')

@section('tittle', 'Edit Kategori')

@section('content')
    <div class="container-category p-3 rounded" style="background-color: #fff">
        <h1>Edit Kategori</h1>
        <div class="mt-2 d-flex justify-content-end">
            <a href="/categories" class="btn btn-primary me-3">Kembali</a>
        </div>
        <hr>

        <div class="w-50">
            <form action="/category-edit/{{ $category->slug }}/" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection
