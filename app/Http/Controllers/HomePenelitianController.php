<?php

namespace App\Http\Controllers;

use App\Model\Skripsi;
use Illuminate\Http\Request;

class HomePenelitianController extends Controller
{
    public function index()
    {
        $skripsis = Skripsi::paginate(10);
        return view('welcome', \compact('skripsis'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }
}
