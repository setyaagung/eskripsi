@extends('layouts.app')

@section('content')
<div class="tentang mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="container">
                    <h5>{{ $praja->judul_praja}}</h5>
                    <p class="mt-4" style="color: #B4C6A6;font-size: 13px;"><i>Praktek Kerja, {{
                            $praja->mahasiswa->program_studi}}, {{
                            \Carbon\Carbon::parse($praja->created_at)->format('Y')}}</i></p>
                    <p style="margin-top: -15px;font-size: 13px;">{{ $praja->mahasiswa->nama_mahasiswa}}</p>
                    <hr style="border-top: 1px solid #eaeaea !important;margin-top: -13px">
                    <h6 class="font-weight-bold">PEMBIMBING</h6>
                    <p class="text-justify">@if ($praja->id_dosen == null)

                        @else
                        {{ $praja->dosen->nama_dosen}}
                        @endif</p>
                    <h6 class="font-weight-bold">LATAR BELAKANG</h6>
                    <p class="text-justify">{!! $praja->latar_belakang !!}</p>
                    <h6 class="font-weight-bold">MANFAAT</h6>
                    <p class="text-justify">{!! $praja->manfaat !!}</p>
                    <h6 class="font-weight-bold">TUJUAN</h6>
                    <p class="text-justify">{!! $praja->tujuan !!}</p>
                    <h6 class="font-weight-bold">FILE</h6>
                    <p class="text-justify">
                        @if ($praja->file == null)

                        @else
                        <a href="{{ Storage::url($praja->file)}}" class="btn btn-sm btn-danger" target="_blank"><i
                                class="fas fa-file-pdf"></i> File</a>
                        @endif
                    </p>
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
                            praja
                            <span class="badge badge-primary badge-pill">{{
                                \App\Model\praja::where('publish',1)->count()}}</span>
                        </li>
                        <li class="list-group-item" style="border: none;margin-bottom: -15px">
                            Praktek Kerja
                            <span class="badge badge-primary badge-pill">{{
                                \App\Model\Praja::where('publish',1)->count()}}</span>
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
