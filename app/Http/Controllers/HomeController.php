<?php

namespace App\Http\Controllers;

use App\Model\Dosen;
use App\Model\File;
use App\Model\Mahasiswa;
use App\Model\Skripsi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $files = File::where('id_skripsi', $skripsi->id_skripsi)->get();
        return view('frontend.skripsi.index', \compact('user', 'mahasiswa', 'skripsi', 'files'));
    }
    public function edit_skripsi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $dosens = Dosen::orderBy('nip', 'ASC')->get();
        return view('frontend.skripsi.edit', \compact('user', 'mahasiswa', 'skripsi', 'dosens'));
    }
    public function update_skripsi(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('judul_indo'));
        $skripsi->update($data);
        return redirect()->route('skripsi')->with('update', 'Data skripsi berhasil diperbarui');
    }
    public function create_file()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        return view('frontend.skripsi.upload', compact('user', 'mahasiswa', 'skripsi'));
    }
    public function upload_file(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $data = $request->all();
        $request->validate([
            'nama_file' => 'mimes:pdf|max:50000'
        ]);
        $data['id_skripsi'] = $skripsi->id_skripsi;
        $data['nama_file'] = $request->file('nama_file')->store('skripsi/file', 'public');
        File::create($data);
        return redirect()->route('skripsi')->with('create', 'Upload file skripsi berhasil ditambahkan');
    }
    public function delete_file()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $file = File::where('id_skripsi', $skripsi->id_skripsi)->first();
        Storage::delete($file->nama_file);
        $file->delete();
        return redirect()->route('skripsi')->with('delete', 'File skripsi berhasil dihapus');
    }
}
