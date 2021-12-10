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
                        <h6 class="font-weight-bold">Pembimbing</h6>
                        <p class="text-justify">
                            <ul>
                                <li>Pembimbing 1 :
                                    @if ( $skripsi->pembimbing1 != null)
                                        {{ $skripsi->pem1->nama_dosen}}
                                    @endif
                                </li>
                                <li>Pembimbing 2 :
                                    @if ( $skripsi->pembimbing2 != null)
                                        {{ $skripsi->pem2->nama_dosen}}
                                    @endif
                                </li>
                            </ul>
                        </p>
                        <h6 class="font-weight-bold">Penguji</h6>
                        <p class="text-justify">
                            <ul>
                                <li>Penguji 1 :
                                    @if($skripsi->penguji1 != null)
                                        {{ $skripsi->peng1->nama_dosen}}
                                    @endif
                                </li>
                                <li>Penguji 2 :
                                    @if($skripsi->penguji2 != null)
                                        {{ $skripsi->peng2->nama_dosen}}
                                    @endif
                                </li>
                                <li>Penguji 3 :
                                    @if($skripsi->penguji3 != null)
                                        {{ $skripsi->peng3->nama_dosen}}
                                    @endif
                                </li>
                            </ul>
                        </p>
                        <h6 class="font-weight-bold">URL</h6>
                        <table class="table table-sm table-borderless" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis File</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $file->jenis_file}}</td>
                                        <td><a href="{{ Storage::url($file->nama_file)}}" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-file"></i> Lihat File</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                        @guest
                            <hr>
                            <h5 class="mb-1 mt-4"><i class="fa fa-user"></i> &nbsp;&nbsp;Account</h5>
                            <ul class="list-group" style="font-size: 16px;margin-left: 10px">
                                <li class="list-group-item" style="border: none;margin-bottom: -15px">
                                    <a href="{{ route('login')}}" class="text-dark">Login</a>
                                </li>
                                <li class="list-group-item" style="border: none;margin-bottom: -15px">
                                    <a href="{{ route('register')}}" class="text-dark">Register</a>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



