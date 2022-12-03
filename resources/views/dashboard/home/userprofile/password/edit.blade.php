@extends('dashboard.layouts.main')
@section('title')
    Ganti Password
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Ganti Password</h4>
        <ul class="nav nav-pills flex-column flex-md-row mb-2">
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
                                                    <small class="text-muted float-end">*Note : Harap mengingat password
                                                        setelah dirubah.</small>
                                                </div>
                                                <hr class="my-2" />
                                                <form action="/dashboard/myprofile/password" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row mb-3 justify-content-center form-password-toggle">
                                                        <label class="col-sm-2 col-form-label" for="old_password">Password
                                                            Lama</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group input-group-merge">
                                                                <input type="password"
                                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                                    id="old_password" name="old_password"
                                                                    placeholder="Isikan Password Lama" autofocus>
                                                                <span class="input-group-text cursor-pointer"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('old_password')
                                                                <div class="text-danger">
                                                                    <i class="menu-icon tf-icons bx bx-alarm-exclamation">
                                                                    </i>{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 justify-content-center form-password-toggle">
                                                        <label class="col-sm-2 col-form-label" for="password">Password
                                                            Baru</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group input-group-merge">
                                                                <input type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    id="password" name="password"
                                                                    placeholder="Isikan Password Baru">
                                                                <span class="input-group-text cursor-pointer"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">
                                                                    <i class="menu-icon tf-icons bx bx-alarm-exclamation">
                                                                    </i>{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 justify-content-center form-password-toggle">
                                                        <label class="col-sm-2 col-form-label"
                                                            for="password_confirmation">Konfirmasi
                                                            Password Baru</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group input-group-merge">
                                                                <input type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    id="password_confirmation" name="password_confirmation"
                                                                    placeholder="Isikan Konfirmasi Password Baru">
                                                                <span class="input-group-text cursor-pointer"><i
                                                                        class="bx bx-hide"></i></span>
                                                            </div>
                                                            @error('password')
                                                                <div class="text-danger">
                                                                    <i class="menu-icon tf-icons bx bx-alarm-exclamation">
                                                                    </i>{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <div class="col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Ganti
                                                                Password</button>
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
