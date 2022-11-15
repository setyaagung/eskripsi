<?php

namespace App\Http\Controllers;

use App\Model\Dosen;
use App\Model\Mahasiswa;
use App\Model\Praja;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PrajaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $praja = Praja::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        return view('frontend.praja.index', \compact('user', 'mahasiswa', 'praja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_praja()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $praja = Praja::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $dosens = Dosen::orderBy('nip', 'ASC')->get();
        return view('frontend.praja.edit', \compact('user', 'mahasiswa', 'praja', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_praja(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        $praja = Praja::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $request->validate([
            'file' => 'mimes:pdf|max:20000',
        ]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->input('judul_praja'));
        $data['publish'] = 1;
        if ($request->file('file') != \null) {
            $data['file'] = $request->file('file')->store('praja/file', 'public');
        }
        $praja->update($data);
        return redirect()->route('praja')->with('update', 'Data laporan praja berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
