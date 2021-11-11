@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    Surat Keterangan Pendamping Ijazah
                    <div class="float-right">
                        <a href="{{ route('skpi.create')}}" class="btn btn-sm btn-warning"><i class="fa fa-file"></i> Tambah</a>
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
                                <th>PELATIHAN/KEGIATAN</th>
                                <th>TAHUN</th>
                                <th>URL</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skpis as $skpi)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $skpi->nama_pelatihan}}</td>
                                    <td>{{ \Carbon\Carbon::parse($skpi->tanggal)->isoFormat('D MMMM Y')}}</td>
                                    <td><a href="{{ Storage::url($skpi->file)}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-file"></i> File</a></td>
                                    <td>
                                        <form action="{{ route('skpi.destroy',$skpi->id_skpi)}}" method="POST">
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
