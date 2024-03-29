@extends('layouts.app')

@section('search')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-warning">Panduan Skripsi</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="tentang" style="margin-top: -20px">
        <div class="container">
            <h4 class="font-weight-bold ">Panduan</h4>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px">
            <h5>Silahkan download panduan eskripsi pada link dibawah ini :</h5>
            <ol class="text-justify mt-3 penelitian" style="margin-left: -24px;font-size: 16px">
                <li><a href="{{ asset('panduan/pedoman.pdf') }}" class="ml-5" target="_blank">Pedoman Penulisan
                        Skripsi</a></li>
                <li><a href="{{ asset('panduan/KARTU BIMBINGAN SKRIPSI.pdf') }}" class="ml-5" target="_blank">Kartu
                        Bimbingan Skripsi</a></li>
                <li><a href="{{ asset('panduan/PANDUAN UPLOAD SKRIPSI.pdf') }}" class="ml-5" target="_blank">Panduan
                        Upload Skripsi</a></li>
                <li><a href="{{ asset('panduan/PANDUAN UPLOAD LAPORAN PRAKTEK KERJA.pdf') }}" class="ml-5"
                        target="_blank">Panduan Upload Praktek Kerja</a></li>
                <li><a href="{{ asset('img/logo.png') }}" class="ml-5" target="_blank">Logo STIE Cendekia Karya Utama (
                        NO.48/SK/CKU/2021)</a></li>
                <li><a href="" class="ml-5">SK Penetapan Logo STIE Cendekia Karya Utama</a></li>
            </ol>
        </div>
    </div>
</div>
@endsection
