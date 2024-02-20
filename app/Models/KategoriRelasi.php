<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriRelasi extends Model
{
    use HasFactory;
    protected $table = "kategoriRelasi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','buku_id','kategoribuku_id'
    ];

    public function buku() 
    {
        return $this->hasMany(Buku::class);
    }

    public function kategoriBuku(){
        return $this->belongsTo(Kategori::class, 'nama_kategori', 'nama_kategori');
    }
}
