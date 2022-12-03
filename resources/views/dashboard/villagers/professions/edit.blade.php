@extends('dashboard.layouts.main')
@section('title')
    Edit Pekerjaan
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Pekerjaan</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Pekerjaan</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/dashboard/professions/{{ $profession->id }}">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="profession_name">Jenis Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="profession_name" name="profession_name"
                                        placeholder="Isikan Jenis Pekerjaan"
                                        value="{{ old('profession_name', $profession->profession_name) }}" required
                                        autofocus>
                                    @error('profession')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit Pekerjaan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
