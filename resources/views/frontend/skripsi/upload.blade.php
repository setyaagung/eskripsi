@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    UPLOAD FILE SKRIPSI
                </div>
                <div class="card-body">
                    <table class="table table-sm" style="width: 100%;font-size:13px">
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nim}}</td>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->program_studi}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td colspan="4">{{ $mahasiswa->nama_mahasiswa}}</td>
                        </tr>
                    </table>
                    <hr>
                    <form action="{{ route('upload.file')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Jenis File</label>
                            <div class="col-sm-10">
                                <select name="jenis_file" class="form-control" required>
                                    <option value="">-- Pilih File --</option>
                                    <option value="File Komplit" {{ old('jenis_file') == 'File Komplit' ? 'selected':''}}>File Komplit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Upload File</label>
                            <div class="col-sm-10">
                                <input type="file" class="p-1 form-control @error('nama_file') is-invalid @enderror" name="nama_file" required>
                                @error('nama_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="text-muted" style="font-size: 12px">
                                    <i>Hanya file PDF yang berkukuran maksimal 50 MB</i>
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="float-right">
                            <a href="{{ route('skripsi')}}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
