@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    SKRIPSI ANDA
                    <div class="float-right">
                        <a href="" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm" style="width: 100%;font-size:13px">
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nim}}</td>
                            <td>Pembimbing 1</td>
                            <td>:</td>
                            <td>{{ $skripsi->pembimbing1}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nama_mahasiswa}}</td>
                            <td>Pembimbing 2</td>
                            <td>:</td>
                            <td>{{ $skripsi->pembimbing2}}</td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->program_studi}}</td>
                            <td>Penguji 1</td>
                            <td>:</td>
                            <td>{{ $skripsi->penguji1}}</td>
                        </tr>
                        <tr>
                            <td>Mulai Bimbingan</td>
                            <td>:</td>
                            <td>
                                @if ($skripsi->mulai_bimbingan == null)

                                @else
                                    {{ \Carbon\Carbon::parse($skripsi->mulai_bimbingan)->isoFormat('D MMMM Y')}}
                                @endif
                            </td>
                            <td>Penguji 2</td>
                            <td>:</td>
                            <td>{{ $skripsi->penguji2}}</td>
                        </tr>
                        <tr>
                            <td>Selesai Bimbingan</td>
                            <td>:</td>
                            <td>
                                @if ($skripsi->selesai_bimbingan == null)

                                @else
                                    {{ \Carbon\Carbon::parse($skripsi->selesai_bimbingan)->isoFormat('D MMMM Y')}}
                                @endif
                            </td>
                            <td>Penguji 3</td>
                            <td>:</td>
                            <td>{{ $skripsi->penguji3}}</td>
                        </tr>
                        <tr>
                            <td>Judul Indo</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->judul_indo}}</td>
                        </tr>
                        <tr>
                            <td>Judul Eng</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->judul_eng}}</td>
                        </tr>
                        <tr>
                            <td>Abstrak Indo</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->abstrak_indo}}</td>
                        </tr>
                        <tr>
                            <td>Abstrak Eng</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->abstrak_eng}}</td>
                        </tr>
                        <tr>
                            <td>Keyword</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->keyword}}</td>
                        </tr>
                        <tr>
                            <td>Daftar Pustaka</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->daftar_pustaka}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
