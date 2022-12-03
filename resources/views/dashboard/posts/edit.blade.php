@extends('dashboard.layouts.main')
@section('title')
    Edit Post
@endsection
@section('stylesheet')
    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <style>
        trix-toolbar .trix-button-group--file-tools {
            display: none;
        }
    </style>
@endsection
@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Post</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Post</h5>
                        <small class="text-muted float-end">*Note : Slug akan berubah secara otomatis apabila pindah
                            kolom.</small>
                    </div>

                    <div class="card-body">
                        <form method="post" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="title">Judul<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('title')
                                        is-invalid
                                    @enderror"
                                        id="title" name="title" placeholder="Isikan Judul Post"
                                        value="{{ old('title', $post->title) }}" autofocus>
                                    @error('title')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="slug">Slug<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('slug')
                                        is-invalid
                                    @enderror"
                                        id="slug" name="slug" readonly required
                                        value="{{ old('slug', $post->slug) }}" />
                                    @error('slug')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="category" class="col-sm-2 col-form-label">Kategori<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="category_id" id="category_id" placeholder="Pilih Kategori..." required>
                                        <option selected></option>
                                        @foreach ($categories as $category)
                                            @if ($post->category == null)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @elseif (old('category_id', $post->category->id) == $category->id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">
                                    Masukkan Gambar</label>
                                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                                <div class="col-sm-10">
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="img-preview img-fluid mb-3 col-sm-5">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input
                                        class="form-control @error('images') is-invalid
                                    @enderror"
                                        type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="body" class="col-sm-2 col-form-label">Body<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input id="body" type="hidden" name="body"
                                        value="{{ old('body', $post->body) }}">
                                    <trix-editor input="body"></trix-editor>
                                    @error('body')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Post</button>
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
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <script>
        // sluggable
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        // Trix Editor
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
