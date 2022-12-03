@extends('dashboard.layouts.main')
@section('title')
    Edit Status Perkawinan
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Status Perkawinan</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Status Perkawinan</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/dashboard/maritals/{{ $marital->id }}">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="marital_name">Jenis Status Perkawinan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="marital_name" name="marital_name"
                                        placeholder="Isikan Jenis Status Perkawinan"
                                        value="{{ old('marital_name', $marital->marital_name) }}" required autofocus>
                                    @error('marital')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Edit Status Perkawinan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
