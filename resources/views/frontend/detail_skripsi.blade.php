@extends('layouts.app')

@section('content')
    <div class="tentang mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="container">
                        <h5>{{ $skripsi->judul_indo}}</h5>
                        <p class="mt-4" style="color: #B4C6A6;font-size: 13px;"><i>Skripsi, {{ $skripsi->mahasiswa->program_studi}}, {{ \Carbon\Carbon::parse($skripsi->created_at)->format('Y')}}</i></p>
                        <p style="margin-top: -15px;font-size: 13px;">{{ $skripsi->mahasiswa->nama_mahasiswa}}</p>
                        <hr style="border-top: 1px solid #eaeaea !important;margin-top: -13px">
                        <h6 class="font-weight-bold">ABSTRAK</h6>
                        <p class="text-justify">{!! $skripsi->abstrak_indo !!}</p>
                        <p class="text-justify">Keyword : {!! $skripsi->kata_kunci !!}</p>
                        <h6 class="font-weight-bold">DAFTAR PUSTAKA</h6>
                        <p class="text-justify">{!! $skripsi->daftar_pustaka !!}</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container">
                        <h5 class="mb-1"><i class="fa fa-globe"></i> &nbsp;&nbsp;Browse</h5>
                        <ul class="list-group" style="font-size: 16px;margin-left: 10px">
                            <li class="list-group-item" style="border: none;margin-bottom: -15px">
                                Dosen
                                <span class="badge badge-primary badge-pill">{{ \App\Model\Dosen::count()}}</span>
                            </li>
                            <li class="list-group-item" style="border: none;margin-bottom: -15px">
                                Skripsi
                                <span class="badge badge-primary badge-pill">{{ \App\Model\Skripsi::where('publish',1)->count()}}</span>
                            </li>
                            <li class="list-group-item" style="border: none;">
                                Pengguna
                                <span class="badge badge-primary badge-pill">{{ \App\Model\Mahasiswa::count()}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



