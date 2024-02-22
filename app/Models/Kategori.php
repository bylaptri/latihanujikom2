<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = "kategoriBuku";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','nama_kategori'
    ];

    public function kategoriRelasi() 
    {
        return $this->hasMany(KategoriRelasi::class);
    }
}