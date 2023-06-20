@extends('layouts.mainlayout')

@section('tittle', 'Buku')

@section('content')
    @include('sweetalert::alert')
    <div class="container-listbuku p-3 rounded" style="background-color: #fff">
        <h1>List Buku</h1>

        <div class="my-4 d-flex justify-content-start">
            <a href="book-add" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Buku</a>
        </div>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->categories as $category)
                                {{ $category->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/book-edit/{{ $item->slug }}" class="btn text-white"
                                style="background-color: rgb(49, 211, 0)"><i class="bi bi-subtract me-2"></i>Edit</a>
                            <a href="/book-delete/{{ $item->slug }}" class="btn text-white delete"
                                style="background-color: rgb(211, 18, 0)" id="delete" onclick="confirmation(event)"><i
                                    class="bi bi-trash me-2"></i>Delete</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $books->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>


@endsection
