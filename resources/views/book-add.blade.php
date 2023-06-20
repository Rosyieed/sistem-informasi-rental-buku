@extends('layouts.mainlayout')

@section('tittle', 'Tambah Buku')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @include('sweetalert::alert')
    <div class="container-addbuku p-3 rounded" style="background-color: #fff">
        <h1>Tambah Buku</h1>

        <div class="mt-2 d-flex justify-content-end">
            <a href="/books" class="btn btn-primary me-3">Kembali</a>
        </div>
        <hr>

        <div class="mt-3 w-50">

            <form action="book-add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Kode</label>
                    <input type="text" name="book_code" id="code" class="form-control" placeholder="Kode Buku"
                        required>
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Judul Buku"
                        required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">User</label>
                    <select name="status" id="status" class="form-control select-multiple">
                        <option value="in stock">in stock</option>
                        <option value="not available">not available</option>
                    </select>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.select-multiple').select2();
            });
        </script>
    @endsection
