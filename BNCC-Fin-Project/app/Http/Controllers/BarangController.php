<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function getCreateBarang() {
        return view('create');
    }

    public function createBook(Request $request){
       
        Book::create([
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $request->foto,
        ]);

        return redirect(route('getBarangs'));
    }

}
