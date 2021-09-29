@extends('layouts.app')

@section('search')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-warning">E-skripsi Cendekiaku</h1>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form action="" method="GET">
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback text-dark"></span>
                            <input type="search" name="search" class="form-control" placeholder="Cari judul skripsi ...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="welcome">
        <div class="container">
            <h4>E-skripsi STIE Cendekia Karya Utama</h4>
            <hr style="border-top: 1px solid #eaeaea !important;margin-top: -2px">
            <p class="text-justify" style="font-size: 14px">E-skripsi STIE Cendekia Karya Utama adalah layanan digital untuk pelestarian dan distribusi penelitian ilmiah tentang format materi digital. Hal ini memudahkan sivitas akademika untuk melestarikan dan membagikan publikasi ilmiahnya. Eskripsi ini juga merupakan sistem interoperable yang di-host dan dikelola oleh Perpustakaan Universitas.</p>
        </div>
    </div>
    <div class="jurnal mt-5" style="min-height: 30vh">
        <div class="container">

        </div>
    </div>
@endsection
