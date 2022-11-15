@extends('layouts.app')

@section('search')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-warning">E-Skripsi Cendekiaku</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('search-praja')}}" method="GET">
                    @csrf
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback text-dark"></span>
                        <input type="search" name="search" class="form-control" placeholder="Cari judul praja ...">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="jurnal" style="min-height: 30vh">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h5 class="mb-4"><i class="fa fa-book"></i> &nbsp;&nbsp;Recently Added</h5>
                <hr style="margin-top: -15px">
                @foreach ($prajas as $praja)
                <div class="penelitian">
                    <a href="{{ route('detail_praja',$praja->slug)}}" class="text-justify" style="font-size: 17px;">{{
                        $praja->judul_praja}}</a>
                    <p style="color: #B4C6A6;font-size: 13px;"><i>Praktek Kerja, {{ $praja->mahasiswa->program_studi}},
                            {{
                            \Carbon\Carbon::parse($praja->created_at)->format('Y')}}</i></p>
                    <p style="margin-top: -15px;font-size: 13px;">{{ $praja->mahasiswa->nama_mahasiswa}}</p>
                    <p style="margin-top: -15px;color: #B4C6A6;font-size: 13px;"><i>View {{ $praja->views}}</i></p>
                </div>
                @endforeach
            </div>
            <div class="col-md-3">
                <h5 class="mb-1"><i class="fa fa-globe"></i> &nbsp;&nbsp;Browse</h5>
                <ul class="list-group" style="font-size: 16px;margin-left: 10px">
                    <li class="list-group-item" style="border: none;margin-bottom: -15px">
                        Dosen
                        <span class="badge badge-primary badge-pill">{{ $dosen}}</span>
                    </li>
                    <li class="list-group-item" style="border: none;margin-bottom: -15px">
                        Skripsi
                        <span class="badge badge-primary badge-pill">{{ $count_skripsi}}</span>
                    </li>
                    <li class="list-group-item" style="border: none;margin-bottom: -15px">
                        Praktek Kerja
                        <span class="badge badge-primary badge-pill">{{ $count_praja}}</span>
                    </li>
                    <li class="list-group-item" style="border: none;">
                        Pengguna
                        <span class="badge badge-primary badge-pill">{{ $users}}</span>
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
        <div class="mt-4">
            {{ $prajas->links()}}
        </div>
    </div>
</div>
@endsection
