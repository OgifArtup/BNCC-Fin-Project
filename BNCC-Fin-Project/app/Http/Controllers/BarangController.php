<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use App\Http\Requests\BarangRequest;

class BarangController extends Controller
{
    public function getCreateBarang() {
        $kategoris = Kategori::all();

        return view('admin/addBarang',['kategoris' => $kategoris]);
    }

    public function createBarang(BarangRequest $request){
        
        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = $request->title.uniqid().$request->author.'.'.$extension;
        $request->file('foto')->storeAs('public/image/', $fileName);

        Barang::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect(route('getBarangs'));
    }

    public function getBarangs(){
        $barangs = Barang::with('kategori')->get();
        $kategoris = Kategori::with('barang')->get();

        return view('admin/listBarang', compact('barangs', 'kategoris'));
    }

    public function getCreateKategori() {
        $kategoris = Kategori::all();
        return view('admin/addKategori',['kategoris' => $kategoris]);
    }

    public function createKategori(Request $request){
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect(route('getCreateKategori'));
    }

    public function deleteKategori($id){
        $kategori = Kategori::find($id);
        Kategori::where("id", $kategori->id)->delete();
        Kategori::destroy($id);
        return redirect(route('getCreateKategori'));
    }

    public function updateBarang(BarangRequest $request, $id) {
        $barang = Barang::find($id);

        $extension = $request->file('foto')->getClientOriginalExtension();
        $fileName = $request->title.uniqid().$request->author.'.'.$extension;
        $request->file('FOTO')->storeAs('public/image/', $fileName);

        $barang -> update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'foto' => $fileName,
            'id_kategori' => $request->id_kategori,
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

    public function viewBarangs(){
        $barangs = Barang::with('kategori')->get();
        $kategoris = Kategori::with('barang')->get();

        return view('user/viewBarang', compact('barangs', 'kategoris'));
    }

    public function sortByCategory($id){
        if(Kategori::where('id', $id)->exists()){
            $kategoris = Kategori::where('id', $id)->first();
            $barangs = Barang::where('id_kategori', $kategoris->id)->get();
            $kategori2 = Kategori::with('barang')->get();
            return view('user/sortCategory', compact('kategoris', 'barangs', 'kategori2'));
        }
        else{
            return redirect('/view-barang')->with('Kategori does not exist');
        }
    }
}
