<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanBuku extends Model
{
    protected $table = "ulasanbuku";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','user_id','buku_id','ulasan','rating'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
