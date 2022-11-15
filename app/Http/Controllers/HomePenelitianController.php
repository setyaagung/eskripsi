<?php

namespace App\Http\Controllers;

use App\Model\Dosen;
use App\Model\File;
use App\Model\Mahasiswa;
use App\Model\Praja;
use App\Model\Skripsi;
use Illuminate\Http\Request;

class HomePenelitianController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::where('publish', 1)->paginate(10);
        $count_skripsi = Skripsi::where('publish', 1)->count();
        $count_praja = Praja::where('publish', 1)->count();
        $users = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('welcome', \compact('skripsis', 'count_skripsi', 'count_praja', 'users', 'dosen'));
    }

    public function search_skripsi(Request $request)
    {
        $skripsis = Skripsi::where('judul_indo', 'like', "%" . $request->search . "%")->where('publish', 1)->paginate(10);
        $count_skripsi = Skripsi::where('publish', 1)->count();
        $count_praja = Praja::where('publish', 1)->count();
        $users = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('welcome', \compact('skripsis', 'count_skripsi', 'count_praja', 'users', 'dosen'));
    }

    public function detail_skripsi($slug)
    {
        $skripsi = Skripsi::where('slug', $slug)->first();
        Skripsi::find($skripsi->id_skripsi)->increment('views');
        $files = File::where('id_skripsi', $skripsi->id_skripsi)->get();
        return view('frontend.detail_skripsi', \compact('skripsi', 'files'));
    }

    public function praja()
    {
        $prajas = Praja::where('publish', 1)->paginate(10);
        $count_praja = Praja::where('publish', 1)->count();
        $count_skripsi = Skripsi::where('publish', 1)->count();
        $users = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('frontend.praja', \compact('prajas', 'count_praja', 'count_skripsi', 'users', 'dosen'));
    }

    public function search_praja(Request $request)
    {
        $prajas = Praja::where('judul_praja', 'like', "%" . $request->search . "%")->where('publish', 1)->paginate(10);
        $count_praja = Praja::where('publish', 1)->count();
        $count_skripsi = Skripsi::where('publish', 1)->count();
        $users = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('frontend.praja', \compact('prajas', 'count_praja', 'count_skripsi', 'users', 'dosen'));
    }

    public function detail_praja($slug)
    {
        $praja = Praja::where('slug', $slug)->first();
        Praja::find($praja->id_praja)->increment('views');
        return view('frontend.detail_praja', \compact('praja'));
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
