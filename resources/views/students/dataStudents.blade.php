@extends('layout.mainLayout')

@section('title', 'LPPM-KKN | Dashboard')

@section('content')
<div class="page-inner"> 
    <div class="page-header">
        <h4 class="page-title">Daftar Mahasiswa</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="/">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Master</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Mahasiswa</a>
            </li>
        </ul>
    </div>

    <!-- Alert -->
    @if (Session::has('status')=='success')
    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif(Session::has('status')=='failed')
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->has('photo'))
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        {{ $errors->first('photo') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <!-- Alert -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Tambah data
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">Tambah Data Mahasiswa</span> 
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/mahasiswa/tambah" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Mahasiswa</label>
                                                    <input id="student" type="text" class="form-control" name="name" placeholder="Masukkan nama mahasiswa..." required>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Jurusan</label>
                                                    <select class="form-control" name="major" required>
                                                        @foreach ($majors as $major)
                                                        <option value="{{ $major->major_id }}">{{ ucwords($major->name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Nomor telepon</label>
                                                    <input id="phone" type="text" class="form-control" name="phone" placeholder="Masukkan nama phone..." required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo">Foto</label>
                                                    <input type="file" class="form-control-file" name="photo" id="photo" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th style="width: 15%">Id</th>
                                    <th style="width: 20%">Nama</th>
                                    <th style="width: 10%">No Telepon</th>
                                    <th style="width: 20%">Fakultas</th>
                                    <th style="width: 15%">Jurusan</th>
                                    {{-- <th style="width: 10%">Foto</th> --}}
                                    <th style="width: 5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($students as $student) {
                                ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $student->student_id }}</td>
                                        <td>{{ ucwords($student->name) }}</td>
                                        <td>{{ ucwords($student->phone) }}</td>
                                        <td>{{ ucwords($student->majors->faculties->name) }}</td>
                                        <td>{{ ucwords($student->majors->name) }}</td>
                                        {{-- <td><img src="{{ asset('storage/photo/'.$student->photo) }}" alt="{{ ucwords($student->name) }}" style="width: 50px"></td> --}}
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/mahasiswa/{{ $student->student_id }}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="#" onclick="confirmDelete('{{ $student->student_id }}')">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++; }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id){
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang sudah dihapus tidak dapat diakses kembali",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, saya yakin'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="mahasiswa/hapus/"+id;
            }
        })
    }
</script>