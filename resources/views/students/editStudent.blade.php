@extends('layout.mainLayout')

@section('title', 'LPPM-KKN | Dashboard')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Mahasiswa</h4>
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
                <a href="/mahasiswa">Mahasiswa</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit</a>
            </li>
        </ul>
    </div>

    @foreach ($student as $data)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <form action="/mahasiswa/foto/{{ $data->student_id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <img src="{{ asset('storage/photo/'.$data->photo) }}" alt="{{ ucwords($data->name) }}" class="ml" style="width: 100px">

                                <input type="file" class="form-control-file mt-3" name="photo" id="photo" required>

                                <div><button type="submit" class="btn btn-primary btn-sm mt-2">Ubah foto</button></div>
                            </form>
                        </div>
                        <div class="col-md-10">
                            <form action="/mahasiswa/{{ $data->student_id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="id">Id</label>
                                    <input type="text" class="form-control" name="id" id="id" value="{{ $data->student_id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ 
                                    ucwords($data->name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nomor telepon</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ 
                                    $data->phone }}">
                                </div>
                                <div class="form-group form-group-default">
                                    <label>Jurusan</label>
                                    <select class="form-control" name="major">
                                        @foreach ($majors as $major)
                                        <option value="{{ $major->major_id }}" <?= $major->major_id == $data->major_id ? 'selected' : null ?>>{{ ucwords($major->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    


                    
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
