@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background: #046314;">
                    EDIT PRAKTEK KERJA
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
                    <form action="{{ route('update.praja')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Judul Praktek
                                Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="judul_praja"
                                    value="{{ $praja->judul_praja}}">
                                <span class="text-muted" style="font-size: 12px">
                                    <i>setiap penulisan kata diawali dengan huruf kapital, kecuali kata penghubung</i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Tempat Praktek
                                Kerja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="tempat_praja"
                                    value="{{ $praja->tempat_praja}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Latar Belakang</label>
                            <div class="col-sm-10">
                                <textarea id="latar_belakang" name="latar_belakang" class="form-control form-control-sm"
                                    rows="10">{{ $praja->latar_belakang}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Manfaat</label>
                            <div class="col-sm-10">
                                <textarea id="manfaat" name="manfaat" class="form-control form-control-sm"
                                    rows="10">{{ $praja->manfaat}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Tujuan</label>
                            <div class="col-sm-10">
                                <textarea id="tujuan" name="tujuan" class="form-control form-control-sm"
                                    rows="10">{{ $praja->tujuan}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Pembimbing</label>
                            <div class="col-sm-10">
                                <select id="id_dosen" name="id_dosen" class="form-control form-control-sm select2"
                                    style="width: 100%">
                                    <option value=""></option>
                                    @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id_dosen}}" {{ $praja->id_dosen == $dosen->id_dosen ?
                                        'selected':''}}>{{ $dosen->nip}} - {{ $dosen->nama_dosen}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Mulai Praja</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-sm" name="mulai_praja"
                                    value="{{ $praja->mulai_praja}}" style="width: 20%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Selesai Praja</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control form-control-sm" name="selesai_praja"
                                    value="{{ $praja->selesai_praja}}" style="width: 20%">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label" style="font-size: 13px">Upload File</label>
                            <div class="col-sm-10">
                                <input type="file" class="p-1 form-control @error('file') is-invalid @enderror"
                                    name="file" value="{{ Storage::url($praja->file)}}">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="float-right">
                            <a href="{{ route('praja')}}" class="btn btn-secondary">Kembali</a>
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
            $('#latar_belakang').summernote({
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
            $('#kesimpulan').summernote({
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
            $('#manfaat').summernote({
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
            $('#tujuan').summernote({
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
