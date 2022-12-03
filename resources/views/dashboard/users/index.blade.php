@extends('dashboard.layouts.main')
@section('title')
    Manajemen Pengguna
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
                        <h5 class="mb-0">Tambah Pengguna</h5>
                    </div>

                    <div class="card-body">
                        <form method="post" action="/dashboard/users">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Nama Lengkap<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                        id="name" name="name" placeholder="Isikan Nama Lengkap"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="username">Username<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('username')
                                        is-invalid
                                    @enderror"
                                        id="username" name="username" placeholder="Isikan Username"
                                        value="{{ old('name') }}">
                                    @error('username')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-password-toggle">
                                <label class="col-sm-2 col-form-label" for="password">Password<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="password"
                                            class="form-control @error('password')
                                        is-invalid
                                    @enderror"
                                            id="password" name="password" placeholder="Isikan Password"
                                            value="{{ old('password') }}">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 form-password-toggle">
                                <label class="col-sm-2 col-form-label" for="password">Password Konfirmasi<a
                                        class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="password"
                                            class="form-control @error('password')
                                            is-invalid
                                        @enderror"
                                            id="password_confirmation" name="password_confirmation"
                                            placeholder="Isikan Konfirmasi Password"
                                            value="{{ old('password_confirmation') }}">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Registrasi Pengguna</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Data Pengguna Terdaftar</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-sm" style="Overflow-x:scroll; Overflow-y:scroll;">
                    <thead class="table-secondary">
                        <tr class="text-nowrap" style="text-align: center;">
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->username }}</td>
                                <td class="px-3">{{ $user->name }}</td>
                                @if ($user->is_admin)
                                    <td style="background-color:paleturquoise;"><b>Administrator</b></td>
                                @else
                                    <td>Bukan Admin</td>
                                @endif
                                <td>
                                    @if ($user->id === auth()->user()->id)
                                    @else
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($user->is_admin)
                                                    <form method="post" action="/dashboard/users/{{ $user->id }}">
                                                        @method('patch')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm ('Yakin Ingin Menurunkan {{ $user->name }} Sebagai User ?')">
                                                            <i class="bx bx-edit-alt me-1" style="color:orange;"></i>
                                                            Jadikan User Biasa</button>
                                                    </form>
                                                @else
                                                    <form method="post" action="/dashboard/users/{{ $user->id }}">
                                                        @method('patch')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm('Yakin Ingin Menaikkan {{ $user->name }} Sebagai Admin ?')">
                                                            <i class="bx bx-edit-alt me-1" style="color:orange;"></i>
                                                            Jadikan Admin</button>
                                                    </form>
                                                @endif
                                                @if ($user->is_admin)
                                                    <form action="/dashboard/users/{{ $user->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Yakin Ingin Menghapus Jenis User ?')"
                                                            disabled><i class="bx bx-trash me-1" style="color:red"></i>
                                                            Delete</button>
                                                    </form>
                                                @else
                                                    <form action="/dashboard/users/{{ $user->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Yakin Ingin Menghapus Jenis User ?')"><i
                                                                class="bx bx-trash me-1" style="color:red"></i>
                                                            Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @if ($loop->last)
                                <caption class="ms-4">
                                    Menampilan {{ $loop->iteration }} dari total {{ $user->count() }} data yang
                                    ditemukan.
                                </caption>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('dashboard.layouts.autoclosealert')
@endsection
