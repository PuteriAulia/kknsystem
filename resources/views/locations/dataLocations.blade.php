@extends('layout.mainLayout')

@section('title', 'LPPM-KKN | Lokasi')

@section('content')
<div class="page-inner"> 
    <div class="page-header">
        <h4 class="page-title">Daftar Lokasi</h4>
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
                <a href="#">Lokasi</a>
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
                                        <span class="fw-mediumbold">Tambah Data Lokasi</span> 
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/lokasi/tambah" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kelurahan</label>
                                                    <input id="kelurahan" type="text" class="form-control" name="kelurahan" placeholder="Masukkan nama kelurahan...">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kecamatan</label>
                                                    <input id="kecamatan" type="text" class="form-control" name="kecamatan" placeholder="Masukkan nama kecamatan...">
                                                </div>
                                            </div><div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kabupatenn</label>
                                                    <input id="kabupaten" type="text" class="form-control" name="kecamatan" placeholder="Masukkan nama kabupaten...">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Provinsi</label>
                                                    <input id="provinsi" type="text" class="form-control" name="provinsi" placeholder="Masukkan nama provinsi...">
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
                                    <th style="width: 10%">No</th>
                                    <th style="width: 10%">Id</th>
                                    <th style="width: 15%">Kelurahan</th>
                                    <th style="width: 15%">Kecamatan</th>
                                    <th style="width: 15%">Kabupaten</th>
                                    <th style="width: 15%">Provinsi</th>
                                    <th style="width: 5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=1;
                                    foreach ($locations as $location) {
                                ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $location->location_id }}</td>
                                        <td>{{ ucwords($location->kelurahan) }}</td>
                                        <td>{{ ucwords($location->kecamatan) }}</td>
                                        <td>{{ ucwords($location->kabupaten) }}</td>
                                        <td>{{ ucwords($location->provinsi) }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="/fakultas/{{ $location->location_id }}">
                                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="#" onclick="confirmDelete('{{ $location->location_id }}')">
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
                window.location.href="lokasi/hapus/"+id;
            }
        })
    }
</script>