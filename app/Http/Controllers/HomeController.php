<?php

namespace App\Http\Controllers;

use App\Model\Mahasiswa;
use App\Model\Skripsi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('frontend.skripsi.index', \compact('user', 'mahasiswa', 'skripsi'));
    }
}
