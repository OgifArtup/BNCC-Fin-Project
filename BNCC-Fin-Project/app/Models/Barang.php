<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Cart;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga', 'jumlah', 'foto', 'id_kategori'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'id');
    }
}
