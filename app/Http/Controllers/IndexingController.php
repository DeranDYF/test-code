<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $data['buku'] = Buku::orderBy('judul', 'asc')->get();
        return view('indexing', $data);
    }
}