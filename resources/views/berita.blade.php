@extends('layouts.main')
@section('title')
    <title>Pemdes Sungai Belidak</title>
@endsection
@section('authsection')
    <a href="/posts" class="btn btn-success">Kembali ke Semua Post</a>
    @auth
        <a style="float: right;" href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-primary">Edit
            Postingan</a>
        <br>
    @endauth
@endsection
@section('judul')
    <h3 class="text-center">{{ $post->title }}</h3>
@endsection
@section('container2')
    <div>
        @if ($post->image)
            <div>
                <center>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid" width="50%"
                        style="border:0; position: relative;" allowfullscreen="" loading="lazy">
                </center>
            </div>
        @else
            <img src="" class="img-fluid">
        @endif
        <div class="my-3">
            <article class="my-3 fs-5"
                style="font-family: 'Work Sans', Helvetica, Arial, sans-serif;
            font-size: 16px;">
                {!! $post->body !!}
            </article>
        </div>

        <br>
    </div>
@endsection
