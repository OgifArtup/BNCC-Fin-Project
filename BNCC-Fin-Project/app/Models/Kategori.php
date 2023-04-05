<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori'
    ];

    public function barang(){
        return $this->hasMany(Barang::class, 'id_kategori', 'id');
    }

}
