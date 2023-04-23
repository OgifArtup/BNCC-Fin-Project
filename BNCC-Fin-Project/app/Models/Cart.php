<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_barang',
        'jumlah',
    ];

    public function barang(){
        return $this->hasMany(Barang::class, 'id_barang');
    }
}
