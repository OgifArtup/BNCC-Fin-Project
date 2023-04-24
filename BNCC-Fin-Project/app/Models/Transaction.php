<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nomor_invoice',
        'alamat',
        'kode_pos',
        'total',
    ];
}
