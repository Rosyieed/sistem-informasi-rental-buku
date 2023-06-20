@extends('layouts.mainlayout')

@section('tittle', 'Peminjaman Buku')

@section('content')
    @include('sweetalert::alert')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1 class="mb-2">Form Peminjaman Buku</h1>
        @if (Session::has('message-succ'))
            <p class="alert alert-success text-center">{{ Session::get('message-succ') }}</p>
        @endif
        @if (Session::has('message-count'))
            <p class="alert alert-danger text-center">{{ Session::get('message-count') }}</p>
        @endif
        @if (Session::has('message-not'))
            <p class="alert alert-danger text-center">{{ Session::get('message-not') }}</p>
        @endif
        <hr>
        <div class="col-12 col-md-6">
            <form action="book-rent" method="post">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Username</label>
                    <select name="user_id" id="user" class="form-control userbox">
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="book" class="form-label">Judul Buku</label>
                    <select name="book_id" id="book" class="form-control userbox">
                        @foreach ($books as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.userbox').select2();
            });
        </script>
    @endsection
