@extends('layouts.mainlayout')

@section('tittle', 'Tambah Kategori')

@section('content')
    <div class="container-category p-3 rounded" style="background-color: #fff">
        <h1>Tambah Kategori</h1>
        <div class="my-4 d-flex justify-content-end">
            <a href="categories" class="btn btn-primary">Kembali</a>
        </div>
        <hr>

        <div class=" w-50">
            <form action="category-add" method="post">
                @csrf
                <div>
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

    @endsection
