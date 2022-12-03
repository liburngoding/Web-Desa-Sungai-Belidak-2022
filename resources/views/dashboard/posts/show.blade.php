@extends('dashboard.layouts.main')
@section('title')
    View Post
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <hr class="my-5" /> --}}
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">View Post /</span> {{ $post->title }}</h4>

        <!-- Responsive Table -->
        <div class="card">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="">
                <table class="table" style="Overflow-x:scroll; Overflow-y:scroll;">
                    <thead>
                        <tr class="text-nowrap">
                            <script>
                                feather.replace()
                            </script>
                            <a href="/dashboard/posts" class="btn btn-success mx-3"><i class="bx bx-arrow-back me-1"
                                    style="color:white"></i> Kembali Posts</a>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i
                                    class="bx bx-edit me-1" style="color:white"></i> Edit Post Ini</a>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Yakin Ingin Menghapus Data ?')"
                                    class="btn btn-danger border-0 mx-3"><i class="bx bx-trash me-1"
                                        style="color:white"></i>
                                    Hapus Post Ini</button>
                            </form>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary"><i class="bx bx-show me-1"
                                    style="color:white"></i> Melihat Hasil Post</a>
                            <div class="mx-3 px-3 my-3">
                                @if ($post->image)
                                    <div style="max-height: 500px; overflow:hidden">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                            class="img-fluid" loading="lazy">
                                    </div>
                                @else
                                    <img src="{{ asset('images/no_image.jpg') }}" alt="{{ $post->title }}"
                                        class="img-fluid" loading="lazy">
                                @endif


                                <article class="my-3 fs-5">
                                    {!! $post->body !!}
                                </article>
                            </div>

                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
