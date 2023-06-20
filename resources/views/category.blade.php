@extends('layouts.mainlayout')

@section('tittle', 'Kategori')

@section('content')
    @include('sweetalert::alert')
    <div class="container-category p-3 rounded" style="background-color: #fff">
        <h1>Kategori</h1>

        <div class="my-4 d-flex justify-content-start">
            <a href="category-add" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Kategori</a>
        </div>
        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="category-edit/{{ $item->slug }}"class="btn text-white"
                                style="background-color: rgb(49, 211, 0)"><i class="bi bi-subtract me-2"></i>Edit</a>
                            <a href="category-delete/{{ $item->slug }}"class="btn text-white"
                                style="background-color: rgb(211, 18, 0)"><i class="bi bi-trash me-2"></i>Delete</a>
                            <a href=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
