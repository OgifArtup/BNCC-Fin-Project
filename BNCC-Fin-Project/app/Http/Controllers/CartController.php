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

        return view('user/viewCart', compact('carts'));
    }

    public function createCart($id, Request $request){
        $barang = Barang::where('id', $id)->first();

        $request->validate([
            'jumlah' => "required|integer|min:1|max:$barang->jumlah",
        ]);

        $check = Validator::make($request->all(), [
            'id_barang' => "unique:carts",
        ]);

        $barangName = $barang->nama;
        
        if ($check->fails('id_barang')) {
            return back()->with('failed',  $barangName .= ' has been added before!');
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
