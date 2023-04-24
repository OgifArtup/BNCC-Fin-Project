<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\Models\Transaction;
use App\Models\Tdetail;
use App\Models\Cart;
use App\Models\Barang;
use PDF;

class TransactionController extends Controller
{
    public function getTransaction($id){
        $transaction = Transaction::find($id);
        $tdetails = Tdetail::where('id_transaction', $transaction->id)->get();
        if($transaction->id_user != Auth::user()->id){
            return redirect(route('viewBarangs'));
        }

        return view('user/viewInvoice', compact('transaction', 'tdetails'));
    }

    public function downloadInvoice($id){
        $transaction = Transaction::find($id);
        $tdetails = Tdetail::where('id_transaction', $transaction->id)->get();
        if($transaction->id_user != Auth::user()->id){
            return redirect(route('viewBarangs'));
        }

        $pdf = PDF::loadView('user/invoicePdf', compact('transaction', 'tdetails'));
        return $pdf->download($transaction->nomor_invoice.'.pdf');
    }

    public function checkout(Request $request){
        $carts = Cart::where('id_user', Auth::user()->id)->get();
        if(!Cart::where('id_user', Auth::user()->id)->exists()){
            return back()->with('emptyCart', 'Cart is Empty!!');
        }else{
            $request->validate([
                'alamat' => "required|string|min:10|max:100",
                'kode_pos' => "required|string|min:5|max:5|regex:/^[0-9]+$/",
            ]);
            
            $tr = Transaction::create([
                'id_user' => Auth::user()->id,
                'nomor_invoice' => Helper::InvoiceGenerator(new Transaction, 'nomor_invoice', 6, 'INV'),
                'alamat' => $request->alamat,
                'kode_pos' => $request->kode_pos,
                'total' => $request->total,
            ]);
    
            foreach ($carts as $cart){
                $barang = Barang::find($cart->id_barang);
                $barang->jumlah -= $cart->jumlah;
                $barang->save();

                Tdetail::create([
                    'id_transaction' => $tr->id,
                    'nama' => $cart->barang->nama,
                    'kategori' => $cart->barang->kategori->nama_kategori,
                    'jumlah' => $cart->jumlah,
                    'harga' => $cart->barang->harga,
                ]);

                (new CartController)->deleteItem($cart->id);

            }
        }


        return redirect(route('getTransaction', ['id' => $tr->id]));
    }

    public function transactionHistory(){
        $transactions = Transaction::where('id_user', Auth::user()->id)->get();

        return view('user/transactionsHistory', compact('transactions'));
    }
}
