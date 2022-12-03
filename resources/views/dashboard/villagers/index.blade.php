@extends('dashboard.layouts.main')
@section('title')
    Data Warga
@endsection

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <ul class="nav nav-pills flex-column flex-md-row mb-2">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard/villagers/create"><i class="bx bx-file me-1"></i> Tambah Data
                    Warga</a>
            </li>
            @include('dashboard.layouts.successalert')
        </ul>

        <div class="row justify-content-center">
            <div class="col-md-7 my-3">
                <form action="/dashboard/villagers">
                    @if (request('gender'))
                        <input type="hidden" name="gender" value="{{ request('gender') }}">
                    @elseif (request('religion'))
                        <input type="hidden" name="religion" value="{{ request('religion') }}">
                    @elseif (request('education'))
                        <input type="hidden" name="education" value="{{ request('education') }}">
                    @elseif (request('familyrelation'))
                        <input type="hidden" name="familyrelation" value="{{ request('familyrelation') }}">
                    @elseif (request('bloodtype'))
                        <input type="hidden" name="bloodtype" value="{{ request('bloodtype') }}">
                    @elseif (request('marital'))
                        <input type="hidden" name="marital" value="{{ request('marital') }}">
                    @endif
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search... ( NIK dan Nama )" name="search"
                            value="{{ request('search') }}" />
                        <button class="btn btn-outline-primary bx bx-search" type="submit"></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header">
                Data Warga
                @if (request('gender'))
                    (Berdasarkan Jenis Kelamin)
                @elseif (request('religion'))
                    (Berdasarkan Agama)
                @elseif (request('education'))
                    (Berdasarkan Pendidikan)
                @elseif (request('familyrelation'))
                    (Berdasarkan Status Hubungan Keluarga)
                @elseif (request('bloodtype'))
                    (Berdasarkan Golongan Darah)
                @elseif (request('marital'))
                    (Beradasrkan Status Perkawinan)
                @elseif (request('profession'))
                    (Berdasarkan Pekerjaan)
                @endif
            </h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover table-bordered table-sm" style="Overflow-x:scroll; Overflow-y:scroll;">
                    @if ($villagers->count())
                        <thead class="table-secondary">
                            <tr class="text-nowrap" style="text-align: center;">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Golongan Darah</th>
                                <th>Status Perkawinan</th>
                                <th>Tanggal Perkawinan</th>
                                <th>Status Hubungan Dalam Keluarga</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody style="text-align: center;">
                        @forelse ($villagers as $villager)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td class="px-2">{{ $villager->NIK }}</td>
                                <td>{{ $villager->name }}</td>
                                <td>{{ $villager->gender->gender_name }}</td>
                                <td>{{ $villager->birthplace }}</td>
                                <td>{{ date('d-m-Y', strtotime($villager->birthdate)) }}</td>
                                <td>{{ $villager->religion->religion_name }}</td>
                                <td>{{ $villager->education->education_name }}</td>
                                @if ($villager->profession == null)
                                    <td>-</td>
                                @else
                                    <td>{{ $villager->profession->profession_name }}</td>
                                @endif
                                <td>{{ $villager->bloodtype->bloodtype_name }}</td>
                                @if ($villager->marital == null)
                                    <td>-</td>
                                @else
                                    <td>{{ $villager->marital->marital_name }}</td>
                                @endif
                                @if ($villager->maritaldate == null)
                                    <td>-</td>
                                @else
                                    <td>{{ date('d-m-Y', strtotime($villager->maritaldate)) }}</td>
                                @endif
                                <td>{{ $villager->familyrelation->familyrelation_name }}</td>
                                <td>{{ $villager->father_name }}</td>
                                <td>{{ $villager->mother_name }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="/dashboard/villagers/{{ $villager->id }}/edit"><i
                                                    class="bx bx-edit-alt me-1" style="color:orange;"></i> Edit</a>

                                            <form action="/dashboard/villagers/{{ $villager->id }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Warga ?')"><i
                                                        class="bx bx-trash me-1" style="color:red"></i> Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if ($loop->last)
                                <caption class="ms-4">
                                    Menampilan {{ $loop->iteration }} dari total {{ $villagerscount }} data yang
                                    ditemukan.
                                </caption>
                            @endif
                        @empty
                            <p class="text-center fs-4">Tidak Ada Data Yang Ditemukan</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $villagers->links() }}
        </div>
    </div>
@endsection
@section('script')
    @include('dashboard.layouts.autoclosealert')
@endsection
