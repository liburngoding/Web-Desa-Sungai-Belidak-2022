@extends('dashboard.layouts.main')
@section('title')
    Edit Data Warga
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Data Warga</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Data Warga</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/dashboard/villagers/{{ $villager->id }}">
                            @method('put')
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
                                        value="{{ old('name', $villager->name) }}" autofocus required>
                                    @error('name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="title">NIK<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="number" min="0"
                                        class="form-control @error('nik')
                                        is-invalid
                                    @enderror"
                                        id="NIK" name="NIK" placeholder="Isikan NIK"
                                        value="{{ old('NIK', $villager->NIK) }}" required
                                        oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                    @error('NIK')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    @foreach ($genders as $gender)
                                        <div class="form-check form-check-inline">
                                            @if (old('gender_id', $villager->gender->id) == $gender->id)
                                                <input name="gender_id" id="gender_{{ $gender->id }}"
                                                    class="form-check-input" type="radio" value="{{ $gender->id }}"
                                                    checked />
                                            @else
                                                <input name="gender_id" id="gender_{{ $gender->id }}"
                                                    class="form-check-input" type="radio" value="{{ $gender->id }}" />
                                            @endif
                                            <label class="form-check-label"
                                                for="gender_{{ $gender->id }}">{{ $gender->gender_name }}</label>
                                        </div>
                                    @endforeach
                                    @error('gender_id')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="birthplace">Tempat Lahir<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('birthplace')
                                        is-invalid
                                    @enderror"
                                        id="birthplace" name="birthplace" placeholder="Isikan Tempat Lahir"
                                        value="{{ old('birthplace', $villager->birthplace) }}" required>
                                    @error('birthplace')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="birthdate" class="col-md-2 col-form-label">Tanggal Lahir<a class="text-danger">
                                        *</a></label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date"
                                        value="{{ old('birthdate', $villager->birthdate) }}" id="birthdate"
                                        name="birthdate" required />
                                    @error('birthdate')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="religion" class="col-sm-2 col-form-label">Agama<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="religion_id" id="religion_id" placeholder="Pilih Agama..." required>
                                        <option selected></option>
                                        @foreach ($religions as $religion)
                                            @if (old('religion_id', $villager->religion->id) == $religion->id)
                                                <option value="{{ $religion->id }}" selected>
                                                    {{ $religion->religion_name }}
                                                </option>
                                            @else
                                                <option value="{{ $religion->id }}">{{ $religion->religion_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="education" class="col-sm-2 col-form-label">Pendidikan<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="education_id" id="education_id" placeholder="Pilih Pendidikan..."
                                        required>
                                        <option selected></option>
                                        @foreach ($educations as $education)
                                            @if (old('education_id', $villager->education->id) == $education->id)
                                                <option value="{{ $education->id }}" selected>
                                                    {{ $education->education_name }}
                                                </option>
                                            @else
                                                <option value="{{ $education->id }}">{{ $education->education_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profession" class="col-sm-2 col-form-label">Pekerjaan<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="profession_id" id="profession_id" placeholder="Pilih Pekerjaan..."
                                        required>
                                        <option selected></option>
                                        @foreach ($professions as $profession)
                                            @if ($villager->profession == null)
                                                <option value="{{ $profession->id }}">{{ $profession->profession_name }}
                                                </option>
                                            @elseif (old('profession_id', $villager->profession->id) == $profession->id)
                                                <option value="{{ $profession->id }}" selected>
                                                    {{ $profession->profession_name }}
                                                </option>
                                            @else
                                                <option value="{{ $profession->id }}">{{ $profession->profession_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bloodtype" class="col-sm-2 col-form-label">Golongan Darah<a
                                        class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="bloodtype_id" id="bloodtype_id" placeholder="Pilih Golongan Darah..."
                                        required>
                                        <option selected></option>
                                        @foreach ($bloodtypes as $bloodtype)
                                            @if (old('bloodtype_id', $villager->bloodtype->id) == $bloodtype->id)
                                                <option value="{{ $bloodtype->id }}" selected>
                                                    {{ $bloodtype->bloodtype_name }}
                                                </option>
                                            @else
                                                <option value="{{ $bloodtype->id }}">{{ $bloodtype->bloodtype_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="marital" class="col-sm-2 col-form-label">Status Perkawinan<a
                                        class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select onchange="yesnoCheck(this);" name="marital_id" id="marital_id"
                                        placeholder="Pilih Status Perkawinan..." required>
                                        <option selected></option>
                                        @foreach ($maritals as $marital)
                                            @if ($villager->marital == null)
                                                <option value="{{ $marital->id }}">{{ $marital->marital_name }}
                                                </option>
                                            @elseif (old('marital_id', $villager->marital->id) == $marital->id)
                                                <option value="{{ $marital->id }}" selected>
                                                    {{ $marital->marital_name }}
                                                </option>
                                            @else
                                                <option value="{{ $marital->id }}">{{ $marital->marital_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="maritaldate" class="col-md-2 col-form-label">Tanggal Perkawinan</label>
                                <div class="col-md-10">
                                    @if ($villager->marital == null)
                                        <input class="form-control" type="date" value="" id="maritaldate"
                                            name="maritaldate" />
                                    @else
                                        <input class="form-control" type="date"
                                            value="{{ old('maritaldate', $villager->maritaldate) }}" id="maritaldate"
                                            name="maritaldate" />
                                    @endif
                                    @error('maritaldate')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="familyrelation" class="col-sm-2 col-form-label">Status Hubungan Dalam
                                    Keluarga<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <select name="familyrelation_id" id="familyrelation_id"
                                        placeholder="Pilih Status Hubungan Dalam Keluarga..." required>
                                        <option selected></option>
                                        @foreach ($familyrelations as $familyrelation)
                                            @if (old('familyrelation_id', $villager->familyrelation->id) == $familyrelation->id)
                                                <option value="{{ $familyrelation->id }}" selected>
                                                    {{ $familyrelation->familyrelation_name }}
                                                </option>
                                            @else
                                                <option value="{{ $familyrelation->id }}">
                                                    {{ $familyrelation->familyrelation_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="father_name">Nama Ayah<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('father_name')
                                        is-invalid
                                    @enderror"
                                        id="father_name" name="father_name" placeholder="Isikan Nama Ayah"
                                        value="{{ old('father_name', $villager->father_name) }}" required>
                                    @error('father_name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="mother_name">Nama Ibu<a class="text-danger">
                                        *</a></label>
                                <div class="col-sm-10">
                                    <input type="text"
                                        class="form-control @error('mother_name')
                                        is-invalid
                                    @enderror"
                                        id="mother_name" name="mother_name" placeholder="Isikan Nama Ibu"
                                        value="{{ old('mother_name', $villager->mother_name) }}" required>
                                    @error('mother_name')
                                        <div class="text-danger">
                                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Data Warga</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
