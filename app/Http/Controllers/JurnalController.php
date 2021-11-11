<?php

namespace App\Http\Controllers;

use App\Model\Jurnal;
use App\Model\Mahasiswa;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JurnalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $jurnals = Jurnal::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();
        return view('frontend.jurnal.index', \compact('user', 'mahasiswa', 'jurnals'));
    }

    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        return view('frontend.jurnal.create', \compact('user', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $request->validate([
            'id_mahasiswa' => 'required',
            'judul_indo' => 'required',
            'judul_eng' => 'required',
            'abstrak_indo' => 'required',
            'abstrak_eng' => 'required',
            'keyword' => 'required',
            'tanggal' => 'required',
            'daftar_pustaka' => 'required',
            'file' => 'required|mimes:pdf|max:10000'
        ]);
        $data = $request->all();
        $data['id_mahasiswa'] = $mahasiswa->id_mahasiswa;
        $data['file'] = $request->file('file')->store('jurnal/file', 'public');
        Jurnal::create($data);
        //dd($j);
        return redirect()->route('jurnal')->with('create', 'Jurnal berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->delete();
        Storage::delete($jurnal->file);
        return redirect()->route('jurnal')->with('delete', 'Jurnal berhasil dihapus');
    }
}
