@extends('dashboard.layouts.main')
@section('title')
    Kategori Post
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">

        <ul class="nav nav-pills flex-column flex-md-row mb-2">
            @include('dashboard.layouts.successalert')
        </ul>


        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Kategori Post</h5>
                        <small class="text-muted float-end">*Note : Slug akan berubah secara otomatis apabila pindah
                            kolom.</small>
                    </div>

                    <div class="card-body">
                        <form method="post" action="/dashboard/categories">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        id="name" name="name" placeholder="Isikan Kategori Post"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="slug">Slug</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="slug" name="slug" readonly
                                        value="{{ old('slug') }}" />
                                    @error('slug')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Kategori Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">
            <h5 class="card-header">Kategori Post</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-sm" style="Overflow-x:scroll; Overflow-y:scroll;">

                    <thead class="table-secondary">
                        <tr class="text-nowrap" style="text-align: center;">
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="px-3">{{ $category->name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="/dashboard/categories/{{ $category->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1" style="color:orange;"></i> Edit</a>

                                            <form action="/dashboard/categories/{{ $category->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Warga ?')"><i
                                                        class="bx bx-trash me-1" style="color:red"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($loop->last)
                                <caption class="ms-4">
                                    Menampilan {{ $loop->iteration }} dari total {{ $category->count() }} data yang
                                    ditemukan.
                                </caption>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/categories/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
    @include('dashboard.layouts.autoclosealert')
@endsection
