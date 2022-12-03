@extends('layouts.main')
@section('title')
    <title>Pemdes Sungai Belidak</title>
@endsection
@section('authsection')
    @auth
        <a style="float: right;" href="/dashboard/posts/create" class="btn btn-primary">Tambah Postingan</a>
        <br>
    @endauth
@endsection
@section('judul')
    <h3 class="text-center">Informasi Desa Sungai Belidak</h3>
@endsection
@section('stylesheet')
    <style>
        p {}
    </style>
@endsection
@section('container2')
    <div class="main-content">
        <!-- section -->
        <div class="row">
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-5">
                        <a href="/posts/{{ $post->slug }}" style="text-decoration: none; color:black">
                            <div class="card" style="height: 440px">
                                <div>
                                    @if ($post->image)
                                        <div style="max-height: 170px; overflow:hidden;">
                                            <img class="card-img-top" src="{{ asset('/storage/' . $post->image) }}"
                                                alt="{{ $post->title }}" class="img-fluid" width="100%"
                                                style="border:0; position: relative;" allowfullscreen="" loading="lazy">
                                        </div>
                                    @else
                                        <div style="max-height: 170px; overflow:hidden;">
                                            <img src="{{ asset('images/no_image.jpg') }}" alt="{{ $post->title }}"
                                                class="img-fluid" loading="lazy">

                                        </div>
                                    @endif
                                </div>
                                <div class="body-card card-body">
                                    <p
                                        style="font-family: 'Work Sans', Helvetica, Arial, sans-serif;
                                        font-size: 19px;">
                                        {{ $post->title }}</p>
                                    <small class="text-muted"
                                        style="font-family: 'Work Sans', Helvetica, Arial, sans-serif;
                                        font-size: 14px;">
                                        {{ $post->created_at->diffForHumans() }}
                                        |
                                        @if ($post->category)
                                            {{ $post->category->name }}
                                        @else
                                            <small class="text-danger">
                                                Kategori Terhapus
                                            </small>
                                        @endif
                                    </small>
                                    <p
                                        style="margin-top: 5px;
                                            font-family: 'Work Sans', Helvetica, Arial, sans-serif;
                                            font-size: 16px;">
                                        {!! $post->excerpt !!}</p>
                                    <object>
                                        <svg class="w-6 h-6" fill="none" stroke="#303030" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </object>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
        </div>
    </div>
@else
    <h2 class="text-center">
        {{-- <p class="text-center fs-4">No Post Found</p> --}}
        Tidak Ada Post Yang Ditemukan
    </h2>
    @endif
    <div class="d-flex text-center justify-content-center">
        {{ $posts->links() }}
    </div>
    </div>
@endsection
