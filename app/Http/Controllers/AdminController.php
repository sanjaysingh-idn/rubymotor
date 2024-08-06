<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkRole:admin']);
    }

    public function index()
    {
        return view('admin.index', [
            'title'         => 'Dashboard',
            't_produk'      => Produk::count(),
            't_kategori'    => Kategori::count(),
            't_pesanan'     => Pesanan::count(),
        ]);
    }
}
