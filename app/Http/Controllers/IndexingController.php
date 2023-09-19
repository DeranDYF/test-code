<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buku;

class IndexingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['activeMenu'] = 'indexing';
        $data['title'] = 'Indexing Data';
        $data['buku'] = Buku::join('toko_bukus', 'bukus.id_toko_buku', '=', 'toko_bukus.id')
            ->select('bukus.*', 'toko_bukus.nama_toko')
            ->orderBy('judul')
            ->get();
        return view('indexing', $data);
    }
}
