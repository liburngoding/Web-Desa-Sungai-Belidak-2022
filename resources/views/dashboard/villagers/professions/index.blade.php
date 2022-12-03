@extends('dashboard.layouts.main')
@section('title')
    Jenis Pekerjaan
@endsection
@section('stylesheet')
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
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
                        <h5 class="mb-0">Tambah Jenis Pekerjaan</h5>
                    </div>

                    <div class="card-body">
                        <form method="post" action="/dashboard/professions">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="profession_name">Jenis Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('profession_name')
                                        is-invalid
                                    @enderror"
                                        id="profession_name" name="profession_name" placeholder="Isikan Jenis Pekerjaan"
                                        value="{{ old('profession_name') }}" required>
                                    @error('profession_name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah Jenis Pekerjaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">Jenis Pekerjaan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-sm" style="Overflow-x:scroll; Overflow-y:scroll;">

                    <thead class="table-secondary">
                        <tr class="text-nowrap" style="text-align: center;">
                            <th>No</th>
                            <th>Nama Jenis Pekerjaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        @foreach ($professions as $profession)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="px-3">{{ $profession->profession_name }}</td>
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
                                            <a class="dropdown-item"
                                                href="/dashboard/villagers?profession={{ $profession->id }}"><i
                                                    data-feather="eye" style="color:brown"></i> View</a>
                                            <a class="dropdown-item"
                                                href="/dashboard/professions/{{ $profession->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1" style="color:orange;"></i> Edit</a>

                                            <form action="/dashboard/professions/{{ $profession->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Yakin Ingin Menghapus Jenis Pekerjaan ?')"><i
                                                        class="bx bx-trash me-1" style="color:red"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($loop->last)
                                <caption class="ms-4">
                                    Menampilan {{ $loop->iteration }} dari total {{ $profession->count() }} data yang
                                    ditemukan.
                                </caption>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $professions->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('dashboard.layouts.autoclosealert')
@endsection
