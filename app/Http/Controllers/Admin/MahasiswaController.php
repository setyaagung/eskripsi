<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\File;
use App\Model\Jurnal;
use App\Model\Mahasiswa;
use App\Model\Skpi;
use App\Model\Skripsi;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('backend.mahasiswa.index', \compact('mahasiswas'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function show_skripsi($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $skripsi = Skripsi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->first();
        $files = File::where('id_skripsi', $skripsi->id_skripsi)->get();
        return view('backend.mahasiswa.show-skripsi', \compact('mahasiswa', 'skripsi', 'files'));
    }
    public function show_skpi($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $skpis = Skpi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();
        return view('backend.mahasiswa.show-skpi', \compact('mahasiswa', 'skpis'));
    }
    public function show_jurnal($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurnals = Jurnal::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->get();
        return view('backend.mahasiswa.show-jurnal', \compact('mahasiswa', 'jurnals'));
    }
    public function update_publish($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        if ($skripsi->publish == 1) {
            $publish = 0;
        } else {
            $publish = 1;
        }
        $skripsi->publish = $publish;
        $skripsi->update();
    }

    public function update_approve($id)
    {
        $skripsi = Skripsi::findOrFail($id);
        if ($skripsi->approve == 1) {
            $approve = 0;
        } else {
            $approve = 1;
        }
        $skripsi->approve = $approve;
        $skripsi->update();
    }
}
