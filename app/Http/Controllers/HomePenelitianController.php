<?php

namespace App\Http\Controllers;

use App\Model\Dosen;
use App\Model\Mahasiswa;
use App\Model\Skripsi;
use Illuminate\Http\Request;

class HomePenelitianController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::paginate(10);
        $count_skripsi = Skripsi::where('publish', 1)->count();
        $users = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('welcome', \compact('skripsis', 'count_skripsi', 'users', 'dosen'));
    }

    public function detail_skripsi($slug)
    {
        $skripsi = Skripsi::where('slug', $slug)->first();
        return view('frontend.detail_skripsi', \compact('skripsi'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }
    public function panduan()
    {
        return view('frontend.panduan');
    }
}
