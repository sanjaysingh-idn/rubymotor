<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title'         => 'Home',
            'kategori'      => Kategori::all(),
            'produk'        => Produk::latest()->limit(12)->get(),
            'banner'        => Banner::all(),
        ]);
    }

    public function tentang()
    {
        return view('home.tentang', [
            'title'         => 'Home',
            'kategori'      => Kategori::all(),
            'produk'        => Produk::latest()->limit(12)->get(),
            'banner'        => Banner::all(),
        ]);
    }

    public function produk()
    {
        return view('home.produk', [
            'title'         => 'Produk',
            'kategori'      => Kategori::all(),
            'produk'        => Produk::all(),
            'produkNew'     => Produk::latest()->limit(3)->get(),
            'banner'        => Banner::all(),
        ]);
    }

    public function detailProduk($slug)
    {
        $produk = Produk::where('slug', $slug)->first();

        if ($produk) {
            return view('home.produk_detail', [
                'title'         => 'Daftar Kategori',
                'kategori'      => Kategori::all(),
                'produk'        => $produk,
                'banner'        => Banner::all(),
            ]);
        } else {
            abort(404);
        }
    }
}
