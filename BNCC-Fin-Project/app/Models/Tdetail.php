<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tdetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_transaction',
        'nama',
        'kategori',
        'jumlah',
        'harga',
    ];
}
