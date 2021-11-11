<?php

namespace App\Http\Controllers;

use App\Model\Mahasiswa;
use App\Model\Skpi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SkpiController extends Controller
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
        $skpis = Skpi::where('id_mahasiswa', $mahasiswa->id_mahasiswa)->orderBy('tanggal', 'DESC')->get();
        return view('frontend.skpi.index', \compact('user', 'mahasiswa', 'skpis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $mahasiswa = Mahasiswa::where('id_user', $user->id)->first();
        return view('frontend.skpi.create', \compact('user', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:5000'
        ]);
        $data = $request->all();
        $data['file'] = $request->file('file')->store('skpi/file', 'public');
        Skpi::create($data);
        return redirect()->route('skpi.index')->with('create', 'SKPI berhasil ditambahkan');
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
        $skpi = Skpi::findOrFail($id);
        $skpi->delete();
        if (Storage::exists($skpi->file)) {
            Storage::delete($skpi->file);
        }
        return redirect()->route('skpi.index')->with('delete', 'SKPI berhasil dihapus');
    }
}
