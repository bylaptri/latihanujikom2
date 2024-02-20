<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    public $table = "pengguna";
    protected $guarded = ['id'];
    protected $fillable = [
        'id','username','email','namaLengkap', 'alamat','role'
    ];

    public function peminjam() 
    {
        return $this->hasMany(Peminjam::class);
    }
    
}
