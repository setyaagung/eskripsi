@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    SKRIPSI
                    <div class="float-right">
                        <a href="{{ route('edit.skripsi')}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
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
                            <td style="width: 15%">Pembimbing 1</td>
                            <td style="width: 2%">:</td>
                            <td style="width: 33%">
                                @if ($skripsi->pembimbing1 == null)

                                @else
                                    {{ $skripsi->pem1->nama_dosen}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nama_mahasiswa}}</td>
                            <td>Pembimbing 2</td>
                            <td>:</td>
                            <td>
                                @if ($skripsi->pembimbing2 == null)

                                @else
                                    {{ $skripsi->pem2->nama_dosen}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->program_studi}}</td>
                            <td>Penguji 1</td>
                            <td>:</td>
                            <td>
                                @if ($skripsi->penguji1 == null)

                                @else
                                    {{ $skripsi->peng1->nama_dosen}}
                                @endif
                            </td>
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
                            <td>
                                @if ($skripsi->penguji2 == null)

                                @else
                                    {{ $skripsi->peng2->nama_dosen}}
                                @endif
                            </td>
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
                            <td>
                                @if ($skripsi->penguji3 == null)

                                @else
                                    {{ $skripsi->peng3->nama_dosen}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Publish</td>
                            <td>:</td>
                            <td>{{ $skripsi->publish}}</td>
                            <td>Approve</td>
                            <td>:</td>
                            <td>{{ $skripsi->aprrove}}</td>
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
                            <td colspan="4">{!! $skripsi->abstrak_indo!!}</td>
                        </tr>
                        <tr>
                            <td>Abstrak Eng</td>
                            <td>:</td>
                            <td colspan="4">{!! $skripsi->abstrak_eng!!}</td>
                        </tr>
                        <tr>
                            <td>Keyword</td>
                            <td>:</td>
                            <td colspan="4">{{ $skripsi->kata_kunci}}</td>
                        </tr>
                        <tr>
                            <td>Daftar Pustaka</td>
                            <td>:</td>
                            <td colspan="4">{!! $skripsi->daftar_pustaka!!}</td>
                        </tr>
                        <tr>
                            <td>File</td>
                            <td>:</td>
                            <td colspan="4">
                                <a href="{{ route('create.file')}}" class="btn btn-secondary btn-sm mb-2"><i class="fa fa-file"></i> Tambah File</a>
                                <table class="table table-sm table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS</th>
                                            <th>FILE</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($files as $file)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{ $file->jenis_file}}</td>
                                                <td>
                                                    <a href="{{ Storage::url($file->nama_file)}}" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-file"></i> Lihat File</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('delete.file')}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus file ini??')"><i class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">File Tidak Ada</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
