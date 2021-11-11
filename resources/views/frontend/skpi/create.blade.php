@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    TAMBAH JURNAL MAHASISWA
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('skpi.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_mahasiswa" value="{{ $mahasiswa->id_mahasiswa}}">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Pelatihan/Kegiatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_pelatihan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">File</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p-1 @error('file') is-invalid @enderror" name="file" required>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <a href="{{ route('skpi.index')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
