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
                                Data Jurnal {{ $mahasiswa->nama_mahasiswa}}
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
                                        <th>NIM</th>
                                        <th>NAMA PENULIS</th>
                                        <th>JUDUL</th>
                                        <th>TAHUN</th>
                                        <th>URL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurnals as $jurnal)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td>{{ $jurnal->mahasiswa->nim}}</td>
                                            <td>{{ $jurnal->mahasiswa->nama_mahasiswa}}</td>
                                            <td style="width: 40%">{{ $jurnal->judul_indo}}</td>
                                            <td>{{ \Carbon\Carbon::parse($jurnal->tanggal)->isoFormat('D MMMM Y')}}</td>
                                            <td><a href="{{ Storage::url($jurnal->file)}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-file"></i> File</a></td>
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
