@extends('layout/mainLayout')

@section('title','LPPM-KKN | Edit Jurusan')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Edit Jurusan</h4>
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
                <a href="/jurusan">Jurusan</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="">Edit</a>
            </li>
        </ul>
    </div>

    @foreach ($major as $data)
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/jurusan/{{ $data->major_id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" name="id" id="id" value="{{ $data->major_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="name" class="form-control" name="name" id="name" value="{{ 
                            $data->name }}">
                        </div>
                        <div class="form-group form-group-default">
                            <label>Fakultas</label>
                            <select class="form-control" name="faculty">
                                @foreach ($faculties as $faculty)
                                <option value="{{ $faculty->faculty_id }}" <?= $faculty->faculty_id == $data->faculty_id ? 'selected' : null ?>>{{ ucwords($faculty->name) }}</option>
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
    @endforeach
</div>
@endsection