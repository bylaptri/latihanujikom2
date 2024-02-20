<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $fillable = [
        'user_id',
        'buku_id',
        'TaggalPeminjaman',
        'TaggalPengembalian',
        'StatusPeminjaman'     ];
}
