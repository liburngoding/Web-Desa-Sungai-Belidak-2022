@extends('dashboard.layouts.main')
@section('title')
    Post
@endsection
@section('stylesheet')
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-2">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard/posts/create"><i class="bx bx-file me-1"></i> Tambah Post</a>
            </li>
            @include('dashboard.layouts.successalert')
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-7 my-3 justif">
                <form action="/dashboard/posts">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search... ( Judul atau Isi )" name="search"
                            value="{{ request('search') }}" />
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Postingan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-sm" style="Overflow-x:scroll; Overflow-y:scroll;">
                    <thead class="table-secondary">
                        @if ($posts->count())
                            <tr class="text-nowrap" style="text-align: center;">
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penyunting</th>
                                <th style="width:6%">Action</th>
                            </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                @if ($post->category)
                                    <td>{{ $post->category->name }}</td>
                                @else
                                    <td class="text-danger">==Kategori Terhapus==</td>
                                @endif
                                <td>{{ $post->author->name ?? '==Akun Terhapus==' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <script>
                                                feather.replace()
                                            </script>
                                            <a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}"><i
                                                    class="bx bx-show-alt me-2" style="color:brown"></i> View</a>
                                            <a class="dropdown-item" href="/dashboard/posts/{{ $post->slug }}/edit"><i
                                                    class="bx bx-edit-alt me-2" style="color:orange;"></i> Edit</a>
                                            <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Yakin Ingin Menghapus Post {{ $post->title }} ?')"><i
                                                        class="bx bx-trash me-1" style="color:red"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @if ($loop->last)
                                <caption class="ms-4">
                                    Menampilan {{ $loop->iteration }} dari total {{ $postcount }} post yang ditemukan.
                                </caption>
                            @endif
                        @endforeach
                    @else
                        <p class="text-center fs-4">Tidak Ada Post Yang Ditemukan</p>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

@section('script')
    @include('dashboard.layouts.autoclosealert')
@endsection
