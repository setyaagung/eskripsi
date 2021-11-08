@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    JURNAL
                    <div class="float-right">
                        <a href="{{ route('jurnal.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($message = Session::get('update'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{$message}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($message = Session::get('create'))
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Berhasil!</strong> {{$message}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($message = Session::get('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Dihapus!</strong> {{$message}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-sm" style="width: 100%;font-size:13px">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NIM</th>
                                <th>NAMA PENULIS</th>
                                <th>JUDUL</th>
                                <th>TAHUN</th>
                                <th>URL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurnals as $jurnal)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $jurnal->mahasiswa->nim}}</td>
                                    <td>{{ $jurnal->mahasiswa->nama_mahasiswa}}</td>
                                    <td>{{ $jurnal->judul_indo}}</td>
                                    <td>{{ $jurnal->tanggal}}</td>
                                    <td><a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-file"></i> File</a></td>
                                    <td>
                                        <form action="{{ route('jurnal.destroy',$jurnal->id_jurnal)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus file ini??')"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
