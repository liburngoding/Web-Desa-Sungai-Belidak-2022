@extends('dashboard.layouts.main')
@section('title')
    User Profile
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> User Profile</h4>
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
            @include('dashboard.layouts.successalert')
        </ul>
        <div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-11 col-12 mb-md-0 mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="col-lg-12 mb-4 mb-xl-0">
                                    <div class="mt-1">
                                        <div class="row">
                                            @include('dashboard.layouts.usersidebar')
                                            <div class="col-md-8 col-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h4 class="fw-bold"><span class="text-muted fw-light">Status
                                                            :</span>
                                                        @if (auth()->user()->is_admin)
                                                            Administrator
                                                        @else
                                                            User Biasa
                                                        @endif
                                                    </h4>
                                                    <small class="text-muted float-end">*Note : Username digunakan untuk
                                                        login kembali</small>
                                                </div>
                                                <hr class="my-2" />
                                                <form action="/dashboard/myprofile" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row mb-3 justify-content-center">
                                                        <label class="col-sm-2 col-form-label" for="name">Nama
                                                            Lengkap</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" name="name"
                                                                placeholder="Isikan Nama Lengkap"
                                                                value="{{ old('name', auth()->user()->name) }}">
                                                            @error('name')
                                                                <div class="text-danger">
                                                                    <i
                                                                        class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 justify-content-center">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="username">Username</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('username') is-invalid @enderror"
                                                                id="username" name="username" placeholder="Isikan Username"
                                                                value="{{ old('username', auth()->user()->username) }}">
                                                            @error('username')
                                                                <div class="text-danger">
                                                                    <i
                                                                        class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Edit
                                                                Profile</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('dashboard.layouts.autoclosealert')
@endsection
