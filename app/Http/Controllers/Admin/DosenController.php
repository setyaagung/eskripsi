<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosens = Dosen::orderBy('nama_dosen', 'ASC')->get();
        return view('backend.dosen.index', \compact('dosens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'nip.unique' => 'Maaf, NIP ini sudah digunakan dosen lain',
        ];
        $request->validate([
            'nip' => 'required|string|unique:dosen|max:255',
            'nama_dosen' => 'required|string|max:255',
        ], $message);
        $data = $request->all();
        Dosen::create($data);
        return redirect()->route('dosen.index')->with('create', 'Data dosen berhasil ditambahkan');
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
        $dosen = Dosen::findOrFail($id);
        return view('backend.dosen.edit', compact('dosen'));
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
        $dosen = Dosen::findOrFail($id);
        $message = [
            'nip.unique' => 'Maaf, NIP ini sudah digunakan dosen lain',
        ];
        $request->validate([
            'nip' => 'required|string|max:255|unique:dosen,nip,' . $dosen->id_dosen . ',id_dosen',
            'nama_dosen' => 'required|string|max:255',
        ], $message);
        $data = $request->all();
        $dosen->update($data);
        return redirect()->route('dosen.index')->with('update', 'Data dosen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('delete', 'Data dosen berhasil dihapus');
    }
}
