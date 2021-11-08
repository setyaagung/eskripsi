@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    TAMBAH JURNAL MAHASISWA
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="{{ route('jurnal.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_mahasiswa" value="{{ $mahasiswa->id_mahasiswa}}">
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Nama Mahasiswa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Judul Indonesia</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="judul_indo" value="{{ old('judul_indo')}}" required>
                                    <span class="text-muted" style="font-size: 12px">
                                        <i>setiap penulisan kata diawali dengan huruf kapital, kecuali kata penghubung</i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Judul Eng</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="judul_eng" value="{{ old('judul_eng')}}" required>
                                    <span class="text-muted" style="font-size: 12px">
                                        <i>setiap penulisan kata diawali dengan huruf kapital, kecuali kata penghubung</i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Abstrak Indonesia</label>
                                <div class="col-sm-10">
                                    <textarea id="summernote_indo" name="abstrak_indo" class="form-control " rows="10" required>{{ old('abstrak_indo')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Abstrak English</label>
                                <div class="col-sm-10">
                                    <textarea id="summernote_eng" name="abstrak_eng" class="form-control " rows="10" required>{{ old('abstrak_eng')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Keyword</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " name="keyword" value="{{ old('keyword')}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Daftar Pustaka</label>
                                <div class="col-sm-10">
                                    <textarea id="daftar_pustaka" name="daftar_pustaka" class="form-control " rows="10" required>{{ old('daftar_pustaka')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control " name="tanggal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">File</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control p-1" name="file" required>
                                </div>
                            </div>
                            <hr>
                            <div class="float-right">
                                <a href="{{ route('jurnal')}}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
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
