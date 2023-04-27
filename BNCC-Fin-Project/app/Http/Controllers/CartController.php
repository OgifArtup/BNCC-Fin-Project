<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function viewCart() {
        $carts = Cart::where('id_user', Auth::user()->id)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $barang = Barang::find($cart->id_barang);
            $total += $cart->barang->harga*$cart->jumlah;
            if($barang->jumlah < 1){
                $this->deleteItem($cart->id);
            }
        }

        return view('user/viewCart', compact('carts', 'total'));
    }

    public function createCart($id, Request $request){
        $barang = Barang::where('id', $id)->first();

        $request->validate([
            'jumlah' => "required|integer|min:1|max:$barang->jumlah",
        ]);

        if(Cart::where('id_user', Auth::user()->id)->exists() and Cart::where('id_barang', $request->id_barang)->exists()){
            return back()->with('failed',  $barang->nama .= ' has been added before!');
        }

        Cart::create([
            'id_user' => Auth::user()->id,
            'id_barang' => $id,
            'jumlah' => $request->jumlah,
        ]);

        return back()->with('success', 'Item Added to Cart!');
    }

    public function minusJumlah(Request $request, $id) {
        $cart = Cart::find($id);
        
        if ($cart->jumlah-1 < 1) 
        {
            return back()->with('minusFailed',  'Minimum quantity is 1!');
        }
        
        $cart -> update([
            'jumlah' => --$cart->jumlah,
        ]);
        return back();
    }

    public function plusJumlah(Request $request, $id) {
        $cart = Cart::find($id);
        
        if ($cart->jumlah+1 > $cart->barang->jumlah) 
        {
            return back()->with('plusFailed',  'Quantity is at minimu limit!');
        }
        
        $cart -> update([
            'jumlah' => ++$cart->jumlah,
        ]);
        return back();
    }

    public function deleteItem($id){
        $cart = Cart::find($id);
        Cart::where("id", $cart->id)->delete();
        Cart::destroy($id);
        return back()->with('success', 'Item Removed');
    }
}
