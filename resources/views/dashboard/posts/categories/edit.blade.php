@extends('dashboard.layouts.main')
@section('title')
    Edit Status Perkawinan
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Kategori Post</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">

                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Kategori Post</h5>
                        <small class="text-muted float-end">*Note : Slug akan berubah secara otomatis apabila pindah
                            kolom.</small>
                    </div>

                    <div class="card-body">
                        <form method="post" action="/dashboard/categories/{{ $categories->id }}">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Isikan Kategori Post" value="{{ old('name', $categories->name) }}"
                                        required autofocus>
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
                                        value="{{ old('slug', $categories->slug) }}" />
                                    @error('slug')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit Kategori Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
@endsection
