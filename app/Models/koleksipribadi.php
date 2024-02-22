<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksi extends Model
{
    use HasFactory;
    protected $table = "koleksipribadi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','user_id','buku_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function buku(){
        return $this->belongsTo(Buku::class);
    }
}
