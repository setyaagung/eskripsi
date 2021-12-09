@extends('layouts.back-main')

@section('title','Skripsi Mahasiswa')

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
                                Skripsi - {{ $mahasiswa->nama_mahasiswa}}
                            </h3>
                            <div class="float-right">
                                <a href="{{ route('mahasiswa.index')}}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm" style="width: 100%;font-size:14px">
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
                                    <td style="width: 15%">Approve</td>
                                    <td style="width: 2%">:</td>
                                    <td style="width: 33%">
                                        @if ($skripsi->approve == 1)
                                            <input type="checkbox" class="approve" name="approve" data-id="{{ $skripsi->id_skripsi}}" checked>
                                        @else
                                            <input type="checkbox" class="approve" name="approve" data-id="{{ $skripsi->id_skripsi}}">
                                        @endif
                                    </td>
                                    <td style="width: 15%">Publish</td>
                                    <td style="width: 2%">:</td>
                                    <td style="width: 33%">
                                        @if ($skripsi->publish == 1)
                                            <input type="checkbox" class="publish" name="publish" data-id="{{ $skripsi->id_skripsi}}" checked>
                                        @else
                                            <input type="checkbox" class="publish" name="publish" data-id="{{ $skripsi->id_skripsi}}">
                                        @endif
                                    </td>
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
                                        <table class="table table-sm table-bordered">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th>NO</th>
                                                    <th>JENIS</th>
                                                    <th>FILE</th>
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
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.approve').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/mahasiswa/update-approve/'+id,
                    type: 'GET',
                    success: function (response) {
                        alert('Approve Skripsi Berhasil Diperbarui') ? "": location.reload();
                        //alertify.set('notifier', 'position', 'top-right');
                        //alertify.success(response.status);
                    }
                });

            });

            $('.publish').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/mahasiswa/update-publish/'+id,
                    type: 'GET',
                    success: function (response) {
                        alert('Publish Skripsi Berhasil Diperbarui') ? "": location.reload();
                        //alertify.set('notifier', 'position', 'top-right');
                        //alertify.success(response.status);
                    }
                });

            });
        });
    </script>
@endpush
