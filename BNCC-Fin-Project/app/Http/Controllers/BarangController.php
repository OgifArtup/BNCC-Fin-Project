<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Http\Requests\BarangRequest;

class BarangController extends Controller
{
    public function getCreateBarang() {
        return view('admin/addBarang');
    }

    public function createBarang(BarangRequest $request){
        
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = $request->title.uniqid().$request->author.'.'.$extension;
        $request->file('foto')->storeAs('public/image/', $fileName);

        Barang::create([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
        ]);

        return redirect(route('getBarangs'));
    }

    public function getBarangs(){
        $barangs = Barang::all();
        return view('admin/listBarang', ['barangs' => $barangs]);
    }

    public function updateBarang(BarangRequest $request, $id) {
        $barang = Barang::find($id);

        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = $request->title.uniqid().$request->author.'.'.$extension;
        $request->file('FOTO')->storeAs('public/image/', $fileName);

        $barang -> update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
        ]);

        return redirect(route('getBarangs'));
    }


    public function getBarangById($id) {
        $barang = Barang::find($id);
        return view('admin/editBarang', ['barang' => $barang]);
    }

    public function deleteBarang($id){
        $barang = Barang::find($id);
        unlink("storage/Image/".$barang->foto);
        Barang::where("id", $barang->id)->delete();
        Barang::destroy($id);
        return redirect(route('getBarangs'));
    }

}
