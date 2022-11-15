@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    Praktek Kerja
                    <div class="float-right">
                        <a href="{{ route('edit.praja')}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
                            Edit</a>
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
                        <tr>
                            <td style="width: 15%">NIM</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 33%">{{ $mahasiswa->nim}}</td>
                            <td style="width: 15%">Dosen Pembimbing</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 33%">
                                @if ($praja->id_dosen == null)

                                @else
                                {{ $praja->dosen->nama_dosen}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nama_mahasiswa}}</td>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->program_studi}}</td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td>:</td>
                            <td>
                                @if ($praja->publish == 1)
                                <span class="badge badge-success"><i class="fa fa-check"></i> Disetujui</span>
                                @else
                                <span class="badge badge-danger"><i class="fa fa-timess"></i> Tidak Disetujui</span>
                                @endif
                            </td>
                            <td>Approve</td>
                            <td>:</td>
                            <td>
                                @if ($praja->approve == 1)
                                <span class="badge badge-success"><i class="fa fa-check"></i> Disetujui</span>
                                @else
                                <span class="badge badge-danger"><i class="fa fa-timess"></i> Tidak Disetujui</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Judul Praktek Kerja</td>
                            <td>:</td>
                            <td colspan="4">{{ $praja->judul_praja}}</td>
                        </tr>
                        <tr>
                            <td>Tempat Praktek Kerja</td>
                            <td>:</td>
                            <td colspan="4">{{ $praja->tempat_praja}}</td>
                        </tr>
                        <tr>
                            <td>Mulai Praktek Kerja</td>
                            <td>:</td>
                            <td>
                                @if ($praja->mulai_praja == null)

                                @else
                                {{ \Carbon\Carbon::parse($praja->mulai_praja)->isoFormat('D MMMM Y')}}
                                @endif
                            </td>
                            <td>Selesai Praktek Kerja</td>
                            <td>:</td>
                            <td>
                                @if ($praja->selesai_praja == null)

                                @else
                                {{ \Carbon\Carbon::parse($praja->selesai_praja)->isoFormat('D MMMM Y')}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Latar Belakang</td>
                            <td>:</td>
                            <td colspan="4">{!! $praja->latar_belakang!!}</td>
                        </tr>
                        <tr>
                            <td>Manfaat</td>
                            <td>:</td>
                            <td colspan="4">{!! $praja->manfaat!!}</td>
                        </tr>
                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td colspan="4">{{ $praja->tujuan}}</td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td colspan="4">
                                @if ($praja->file == null)

                                @else
                                <a href="{{ Storage::url($praja->file)}}" class="btn btn-sm btn-danger"
                                    target="_blank"><i class="fa fa-file"></i> Lihat File</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
