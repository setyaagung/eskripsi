@extends('layouts.back-main')

@section('title','Data Mahasiswa')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">

    </div>
    <!-- /.content-header -->
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold">
                                Data SKPI {{ $mahasiswa->nama_mahasiswa}}
                            </h3>
                            <div class="float-right">
                                <a href="{{ route('mahasiswa.index')}}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>PELATIHAN/KEGIATAN</th>
                                        <th>TAHUN</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skpis as $skpi)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $skpi->nama_pelatihan}}</td>
                                            <td>{{ \Carbon\Carbon::parse($skpi->tanggal)->isoFormat('D MMMM Y')}}</td>
                                            <td><a href="{{ Storage::url($skpi->file)}}" class="btn btn-sm btn-danger" target="_blank"><i class="fa fa-file"></i> Lihat File</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
