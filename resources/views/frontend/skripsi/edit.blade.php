@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    EDIT SKRIPSI
                </div>
                <div class="card-body">
                    <table class="table table-sm" style="width: 100%;font-size:13px">
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->nim}}</td>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td>{{ $mahasiswa->program_studi}}</td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td colspan="4">{{ $mahasiswa->nama_mahasiswa}}</td>
                        </tr>
                    </table>
                    <hr>
                    <form action="{{ route('update.skripsi')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Judul Indonesia</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="judul_indo" value="{{ $skripsi->judul_indo}}">
                                <span class="text-muted" style="font-size: 12px">
                                    <i>setiap penulisan kata diawali dengan huruf kapital, kecuali kata penghubung</i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Judul English</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="judul_eng" value="{{ $skripsi->judul_eng}}">
                                <span class="text-muted" style="font-size: 12px">
                                    <i>setiap penulisan kata diawali dengan huruf kapital, kecuali kata penghubung</i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Abstrak Indonesia</label>
                            <div class="col-sm-10">
                                <textarea id="summernote_indo" name="abstrak_indo" class="form-control form-control-sm" rows="10">{{ $skripsi->abstrak_indo}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Abstrak English</label>
                            <div class="col-sm-10">
                                <textarea id="summernote_eng" name="abstrak_eng" class="form-control form-control-sm" rows="10">{{ $skripsi->abstrak_eng}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Keyword</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="kata_kunci" value="{{ $skripsi->kata_kunci}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Daftar Pustaka</label>
                            <div class="col-sm-10">
                                <textarea id="daftar_pustaka" name="daftar_pustaka" class="form-control form-control-sm" rows="10">{{ $skripsi->daftar_pustaka}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Pembimbing 1</label>
                            <div class="col-sm-10">
                                <select id="pembimbing1" name="pembimbing1" class="form-control form-control-sm select2" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id_dosen}}" {{ $skripsi->pembimbing1 == $dosen->id_dosen ? 'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Pembimbing 2</label>
                            <div class="col-sm-10">
                                <select id="pembimbing2" name="pembimbing2" class="form-control form-control-sm select2" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id_dosen}}" {{ $skripsi->pembimbing2 == $dosen->id_dosen ? 'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Penguji 1</label>
                            <div class="col-sm-10">
                                <select id="penguji1" name="penguji1" class="form-control form-control-sm select2" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id_dosen}}" {{ $skripsi->penguji1 == $dosen->id_dosen ? 'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Penguji 2</label>
                            <div class="col-sm-10">
                                <select id="penguji2" name="penguji2" class="form-control form-control-sm select2" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id_dosen}}" {{ $skripsi->penguji2 == $dosen->id_dosen ? 'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Penguji 3</label>
                            <div class="col-sm-10">
                                <select id="penguji3" name="penguji3" class="form-control form-control-sm select2" style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                        <option value="{{ $dosen->id_dosen}}" {{ $skripsi->penguji3 == $dosen->id_dosen ? 'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Mulai Bimbingan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-sm" name="mulai_bimbingan" value="{{ $skripsi->mulai_bimbingan}}" style="width: 20%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Selesai Bimbingan</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-sm" name="selesai_bimbingan" value="{{ $skripsi->selesai_bimbingan}}" style="width: 20%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Nilai Angka</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="nilai_angka" value="{{ $skripsi->nilai_angka}}" style="width: 20%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Nilai Huruf</label>
                            <div class="col-sm-10">
                                <select id="nilai_huruf" name="nilai_huruf" class="form-control form-control-sm select2" style="width: 20%">
                                    <option value=""></option>
                                    <option value="A" {{ $skripsi->nilai_huruf == 'A' ? 'selected':''}}>A</option>
                                    <option value="B" {{ $skripsi->nilai_huruf == 'B' ? 'selected':''}}>B</option>
                                    <option value="C" {{ $skripsi->nilai_huruf == 'C' ? 'selected':''}}>C</option>
                                    <option value="D" {{ $skripsi->nilai_huruf == 'D' ? 'selected':''}}>D</option>
                                    <option value="E" {{ $skripsi->nilai_huruf == 'E' ? 'selected':''}}>E</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="float-right">
                            <a href="{{ route('skripsi')}}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#summernote_indo').summernote({
                height: 240,
                toolbar: [
                    // [groupName, [list of button]]
                    ['fontsize', ['fontsize']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#summernote_eng').summernote({
                height: 240,
                toolbar: [
                    // [groupName, [list of button]]
                    ['fontsize', ['fontsize']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('#daftar_pustaka').summernote({
                height: 240,
                toolbar: [
                    // [groupName, [list of button]]
                    ['fontsize', ['fontsize']],
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
            $('.note-editable').css('font-size','12px');
            $('.select2').select2({
                placeholder: "-- Pilih --"
            });
        });
    </script>
@endpush
